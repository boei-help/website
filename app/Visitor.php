<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Request;
use Jamesh\Uuid\HasUuid;
use Jaybizzle\CrawlerDetect\CrawlerDetect;

class Visitor extends Model
{
    use HasUuid;

    /**
     * The activities that belong to the visitor.
     */
    public function activities()
    {
        return $this->hasMany('App\Activity');
    }

    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();

        // Set and update ip. This can be used to confirm that someone lives in a specific country.
        self::creating(function ($model) {
            $model->ip = $model->getClientIp();
            $model->referer_domain = $model->getRefererDomain();
            $model->referer = $model->getReferer();
            $model->user_agent = (!empty($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '');
            $model->language = (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : '');
            $model->is_mobile = $model->isMobile($model->user_agent);
            $model->is_bot = $model->isSearchBot();
            $model->source = $model->getSource();
            $model->last_active = Carbon::now();
        });
    }

    /**
     * Returns the (existing) visitor class
     * @param $request
     * @return Visitor|null
     */
    public static function getOrCreate()
    {
        $visitor = null;

        // Check if we can find an existing visitor
        $vid = Cookie::get('vid');
        if(!empty($vid)) {
            $visitor = Visitor::find($vid);
        }

        // If we have found our visitor, let's update last active and return it
        if($visitor instanceof Visitor) {
            $visitor->last_active = Carbon::now();
            $visitor->save();
            return $visitor;
        }

        // Have not found the visitor or its incorrect, lets create one and save it
        $visitor = new Visitor;
        $visitor->save();

        $minutes = 60*24 * 365 * 3; // 3 years
        Cookie::queue('vid', $visitor->id, $minutes); // Queue cookie for any reponse

        return $visitor;
    }

    /**
     * Determine source of the visitor
     * https://buffer.com/email-courses/actionable-social-media-strategies/?utm_source=buffer&utm_medium=post-original&utm_content=-image&utm_campaign=25-social-media-strategies
     * utm_source = where do they come from?
     * utm_medium = how is the traffic getting there?
     * utm_campaign = why is the traffic going there?
     * The “source” UTM tag = the referrer (Facebook, Twitter, LinkedIn, YouTube, etc.)
     * The “medium” UTM tag = how the traffic gets to you (for most social media links, this will just be “social”)
     * The “campaign” UTM tag = why the traffic is coming to you (launch, persona, promotion, etc.)
     */
    public function getSource()
    {
        return json_encode(request()->only(['utm_source', 'utm_medium', 'utm_campaign']));
    }

    /**
     * Determine the geographical location based on ip
     * @param $ip
     * @return array
     */
    public function determineGeo($ip) {
        $geo = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip={$ip}"), true);
        return [
            'country' => $geo['geoplugin_countryCode'],
            'continent' => $geo['geoplugin_continentCode'],
        ];
    }

    /**
     * Return if this user agent is from a search bot
     * @param $user_agent
     * @return bool
     */
    public function isSearchBot() {
        $CrawlerDetect = new CrawlerDetect;
        return $CrawlerDetect->isCrawler($this->user_agent);
    }

    /**
     * Function to get the client ip address
     * @return string
     */
    public function getClientIp() {
        $ip_address = '';
        //whether ip is from share internet
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
        {
            $ip_address = $_SERVER['HTTP_CLIENT_IP'];
        }
        //whether ip is from proxy
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        //whether ip is from remote address
        elseif (!empty($_SERVER['REMOTE_ADDR']))
        {
            $ip_address = $_SERVER['REMOTE_ADDR'];
        } else {
            $ip_address = NULL; // when testing in phpunit, this is not set
        }

        return $ip_address;
    }

    /**
     * Determine if visitor is on mobile or not
     * @param $useragent
     * @return bool
     */
    public function isMobile($useragent) {
        // https://stackoverflow.com/questions/15228937/php-check-if-the-page-run-on-mobile-or-desktop-browser
        return (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)));
    }

    /**
     * Get referer from request
     * @return string
     */
    public function getReferer() {
        return request()->header('referer', null);
    }

    /**
     * Get domain referer from request
     * @return string
     */
    public function getRefererDomain() {
        $referer = $this->getReferer();

        if(is_null($referer)) return null;

        return parse_url($referer, PHP_URL_HOST);
    }
}
