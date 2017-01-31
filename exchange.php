<?php

abstract class Exchange
{
    protected $symbols = array();
    protected $prices = array();
    
    public function getSymbols()
    {
        return $this->symbols;
    }
    
    // Can be used for currencies and currency pairs to put in only uppercase letters
    // note: $exchangeSymbol must be have the base currency first and quote currency second (i.e. eth_btc Not btc_eth). The quote currency is usually BTC, USD, or CNY.
    public function makeStandardSymbol($exchangeSymbol) {
        // Convert to Uppercase and remove nonletters.
        return preg_replace('/[^A-Z]/', '', strtoupper ( $exchangeSymbol )); 
    }
    
    // @todo not implemented for all exchanges, setSymbols() must create associative array $this->symbols with keys as standard symbols and  values as exchange symbols for this function to work.
    public function getExchangeSymbol($standardSymbol) {
        if(!$this->symbols) $this->setSymbols();

        if( isset($this->symbols[$standardSymbol]) ) {
            return $this->symbols[$standardSymbol];
        } else {
            throw new Exception("Can't find symbol '" . $standardSymbol ."'" );
        }
    }
    
    public function getPrices()
    {
        return $this->prices;
    }
}

?>
