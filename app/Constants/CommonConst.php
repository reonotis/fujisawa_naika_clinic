<?php

namespace App\Constants;

/**
 * 共通定数（クリニック情報など）
 */
class CommonConst
{
    /** 郵便番号 */
    public const CLINIC_POSTAL_CODE = '270-0176';

    /** 住所 */
    public const CLINIC_ADDRESS = '流山市加4-18-2';

    /** クリニック電話番号（表示・tel:リンク用） */
    public const CLINIC_TEL = '04-7150-1441';

    /** FAX番号 */
    public const CLINIC_FAX = '04-7158-8498';

    /** 診療時間（午前） */
    public const CLINIC_HOURS_AM = '9:00~12:00';

    /** 診療時間（午後） */
    public const CLINIC_HOURS_PM = '14:00~17:00';

    /** 土曜午後休診の注記 */
    public const CLINIC_HOURS_SAT_NOTE = '（土のみ午後休診）';

    /** 休診日 */
    public const CLINIC_CLOSED_DAYS = '木・日・祝';
}
