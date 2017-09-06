<?php
namespace bunq\Model\Generated;

use bunq\Context\ApiContext;
use bunq\Http\ApiClient;
use bunq\Http\BunqResponse;
use bunq\Model\BunqModel;
use bunq\Model\Generated\Object\Schedule;
use bunq\Model\Generated\Object\SchedulePaymentEntry;

/**
 * Endpoint for schedule payments.
 *
 * @generated
 */
class SchedulePayment extends BunqModel
{
    /**
     * Field constants.
     */
    const FIELD_PAYMENT = 'payment';
    const FIELD_SCHEDULE = 'schedule';

    /**
     * Endpoint constants.
     */
    const ENDPOINT_URL_CREATE = 'user/%s/monetary-account/%s/schedule-payment';
    const ENDPOINT_URL_DELETE = 'user/%s/monetary-account/%s/schedule-payment/%s';
    const ENDPOINT_URL_READ = 'user/%s/monetary-account/%s/schedule-payment/%s';
    const ENDPOINT_URL_LISTING = 'user/%s/monetary-account/%s/schedule-payment';
    const ENDPOINT_URL_UPDATE = 'user/%s/monetary-account/%s/schedule-payment/%s';

    /**
     * Object type.
     */
    const OBJECT_TYPE = 'SchedulePayment';

    /**
     * The payment details.
     *
     * @var SchedulePaymentEntry
     */
    protected $payment;

    /**
     * The schedule details.
     *
     * @var Schedule
     */
    protected $schedule;

    /**
     * @param ApiContext $apiContext
     * @param mixed[] $requestMap
     * @param int $userId
     * @param int $monetaryAccountId
     * @param string[] $customHeaders
     *
     * @return BunqResponse<int>
     */
    public static function create(ApiContext $apiContext, array $requestMap, $userId, $monetaryAccountId, array $customHeaders = [])
    {
        $apiClient = new ApiClient($apiContext);
        $responseRaw = $apiClient->post(
            vsprintf(
                self::ENDPOINT_URL_CREATE,
                [$userId, $monetaryAccountId]
            ),
            $requestMap,
            $customHeaders
        );

        return static::processForId($responseRaw);
    }

    /**
     * @param ApiContext $apiContext
     * @param string[] $customHeaders
     * @param int $userId
     * @param int $monetaryAccountId
     * @param int $schedulePaymentId
     *
     * @return BunqResponse<null>
     */
    public static function delete(ApiContext $apiContext, $userId, $monetaryAccountId, $schedulePaymentId, array $customHeaders = [])
    {
        $apiClient = new ApiClient($apiContext);
        $responseRaw = $apiClient->delete(
            vsprintf(
                self::ENDPOINT_URL_DELETE,
                [$userId, $monetaryAccountId, $schedulePaymentId]
            ),
            $customHeaders
        );

        return new BunqResponse(null, $responseRaw->getHeaders());
    }

    /**
     * @param ApiContext $apiContext
     * @param int $userId
     * @param int $monetaryAccountId
     * @param int $schedulePaymentId
     * @param string[] $customHeaders
     *
     * @return BunqResponse<SchedulePayment>
     */
    public static function get(ApiContext $apiContext, $userId, $monetaryAccountId, $schedulePaymentId, array $customHeaders = [])
    {
        $apiClient = new ApiClient($apiContext);
        $responseRaw = $apiClient->get(
            vsprintf(
                self::ENDPOINT_URL_READ,
                [$userId, $monetaryAccountId, $schedulePaymentId]
            ),
            [],
            $customHeaders
        );

        return static::fromJson($responseRaw);
    }

    /**
     * This method is called "listing" because "list" is a restricted PHP word
     * and cannot be used as constants, class names, function or method names.
     *
     * @param ApiContext $apiContext
     * @param int $userId
     * @param int $monetaryAccountId
     * @param string[] $params
     * @param string[] $customHeaders
     *
     * @return BunqResponse<BunqModel[]|SchedulePayment[]>
     */
    public static function listing(ApiContext $apiContext, $userId, $monetaryAccountId, array $params = [], array $customHeaders = [])
    {
        $apiClient = new ApiClient($apiContext);
        $responseRaw = $apiClient->get(
            vsprintf(
                self::ENDPOINT_URL_LISTING,
                [$userId, $monetaryAccountId]
            ),
            $params,
            $customHeaders
        );

        return static::fromJsonList($responseRaw, self::OBJECT_TYPE);
    }

    /**
     * @param ApiContext $apiContext
     * @param mixed[] $requestMap
     * @param int $userId
     * @param int $monetaryAccountId
     * @param int $schedulePaymentId
     * @param string[] $customHeaders
     *
     * @return BunqResponse<int>
     */
    public static function update(ApiContext $apiContext, array $requestMap, $userId, $monetaryAccountId, $schedulePaymentId, array $customHeaders = [])
    {
        $apiClient = new ApiClient($apiContext);
        $responseRaw = $apiClient->put(
            vsprintf(
                self::ENDPOINT_URL_UPDATE,
                [$userId, $monetaryAccountId, $schedulePaymentId]
            ),
            $requestMap,
            $customHeaders
        );

        return static::processForId($responseRaw);
    }

    /**
     * The payment details.
     *
     * @return SchedulePaymentEntry
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * @param SchedulePaymentEntry $payment
     */
    public function setPayment(SchedulePaymentEntry $payment)
    {
        $this->payment = $payment;
    }

    /**
     * The schedule details.
     *
     * @return Schedule
     */
    public function getSchedule()
    {
        return $this->schedule;
    }

    /**
     * @param Schedule $schedule
     */
    public function setSchedule(Schedule $schedule)
    {
        $this->schedule = $schedule;
    }
}
