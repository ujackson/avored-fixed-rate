<?php


namespace Ujackson\AvoredFixedRate;


use AvoRed\Framework\Database\Contracts\ConfigurationModelInterface;

class FixedRate
{
    public const CONFIG_FIXED_RATE_COST = 'express_delivery_cost';
    public const CONFIG_KEY = 'express_delivery_enabled';

    /**
     * Identifier for the Shipping Options.
     * @var string
     */
    protected $identifier = 'express-delivery';

    /**
     * Name for the Shipping Options.
     * @var string
     */
    protected $name = 'Express Delivery';


    protected $enable;


    protected $amount;


    /**
     * @var ConfigurationModelInterface
     */
    protected $configRepo;


    public function __construct()
    {
        $this->configRepo = app()->make(ConfigurationModelInterface::class);
        $this->amount = (float) $this->configRepo->getValueByCode(self::CONFIG_FIXED_RATE_COST);
        $this->enable =  $this->configRepo->getValueByCode(self::CONFIG_KEY);
    }


    /**
     * Get the identifier.
     *
     * return string $identifier
     */
    public function identifier(): string
    {
        return $this->identifier;
    }

    /**
     * Get the Name of the Shipping Option.
     *
     * return string $title
     */
    public function name(): string
    {
        return $this->name;
    }


    public function enable()
    {
        return $this->enable;
    }


    public function amount()
    {
        return $this->amount;
    }

    /**
     * Processing Amount for this Shipping Option.
     *
     * @param \Illuminate\Support\Collection $cartProducts
     * @return self
     */
    public function process($cartProducts)
    {
        //execute the shipping api here
        $this->amount = $this->configRepo->getValueByCode(self::CONFIG_FIXED_RATE_COST);

        return $this;
    }
}
