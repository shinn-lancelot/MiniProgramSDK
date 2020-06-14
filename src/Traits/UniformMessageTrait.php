<?php

namespace Hillpy\MiniProgramSDK\Traits;

use Hillpy\MiniProgramSDK\Constants\UniformMessageConstant;
use Hillpy\MiniProgramSDK\Libraries\Common\Common;
use Hillpy\MiniProgramSDK\Libraries\Curl\Curl;
use Hillpy\MiniProgramSDK\Param;

trait UniformMessageTrait
{
    public function send($paramArr = [])
    {
        $finalParamArr = Common::updateArrayData(Param::$uniformMessage[__FUNCTION__], $paramArr);

        $url = UniformMessageConstant::HOST . UniformMessageConstant::SEND_PATH . http_build_query(['access_token' => $finalParamArr['access_token']]);

        return json_decode(Curl::httpRequest($url, $finalParamArr), true);
    }
}