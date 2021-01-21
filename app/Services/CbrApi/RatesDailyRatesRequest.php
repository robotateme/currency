<?php


namespace App\Services\CbrApi;


use App\Services\CbrApi\Contracts\RatesRequestInterface;
use Carbon\Carbon;
use GuzzleHttp\Exception\GuzzleException;
use SimpleXMLElement;

class RatesDailyRatesRequest implements RatesRequestInterface
{
    /**
     * @var string
     */
    public $uri = 'http://www.cbr.ru/scripts/XML_daily.asp';

    /**
     * @var Carbon
     */
    protected $date;
    /**
     * @var array
     */
    protected $isoCodes = [];
    /**
     * @var string
     */
    protected $xmlResult;

    /**
     * @var Carbon
     */
    protected $resultDate;

    /**
     * @param array $isoCodes
     * @return $this
     */
    public function setIsoCodes(array $isoCodes)
    {
        $this->isoCodes = $isoCodes;

        return $this;
    }

    /**
     * @param Carbon $date
     * @return $this
     */
    public function setDate(Carbon $date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @param string $method
     * @return RatesDailyRatesRequest
     * @throws GuzzleException
     */
    public function makeRequest(string $method)
    {
        $handler = new RequestHandler($this);
        try {
            $this->xmlResult = ($handler)
                ->execute($method, ($this->date) ? [
                    'query' => [
                        'date_req' => $this->date->format('d/m/Y')
                    ]
                ] : []);
        } catch (GuzzleException $e) {
            throw $e;
        }
        return $this;
    }

    /**
     * @return array
     */
    public function getResult()
    {
        libxml_use_internal_errors(true);
        $xml = new SimpleXMLElement($this->xmlResult, LIBXML_NONET);
        $this->resultDate = Carbon::now()->addDay();
        if (empty($this->isoCodes)) {
            $xpath = $xml->xpath('Valute');
            $result = [];
            foreach ($xpath as $element) {
                $k = (string)$element->CharCode;
                $result[$k] = [
                    'ID' => (string)$element->attributes()['ID'],
                    'NumCode' => (string)$element->NumCode,
                    'CharCode' => (string)$element->CharCode,
                    'Nominal' => (int)$element->Nominal,
                    'Name' => (string)$element->Name,
                    'Value' => (float)(str_replace(',', '.', $element->Value)),
                    'Date' => $this->resultDate
                ];
            }
            return $result;
        }
        $length = count($this->isoCodes);

        if ($length > 1) {
            $isoCodes = 'CharCode = "' . $this->isoCodes[0] . '"';
            for ($i = 1; $i < $length; $i++) {
                $isoCodes .= ' or CharCode = "' . $this->isoCodes[$i] . '"';
            }
        } else {
            $isoCodes = 'CharCode = "' . $this->isoCodes[0] . '"';
        }

        $xpath = $xml->xpath('Valute[' . $isoCodes . ']');
        $result = [];
        foreach ($xpath as $element) {
            $result[] = [
                'ID' => (string)$element->attributes()['ID'],
                'NumCode' => (string)$element->NumCode,
                'CharCode' => (string)$element->CharCode,
                'Nominal' => (int)$element->Nominal,
                'Name' => (string)$element->Name,
                'Value' => (float)(str_replace(',', '.', $element->Value)),
                'Date' => $this->resultDate
            ];
        }
        return $result;
    }

    /**
     * @return string
     */
    public function getXML(): string
    {
        return $this->xmlResult;
    }

    /**
     * @param string $format
     * @return string
     */
    public function getResultDate(string $format = 'Y-m-d'): string
    {
        return $this->resultDate->format($format);
    }
}
