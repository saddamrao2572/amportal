<?php

namespace app\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\helpers\Url;
class LEComponent extends Component {

    private $encrypt_method = "AES-256-CBC";
    private $secret_key = 'liftezyabcdefghijklmnopqrstuvwxyziv';
    private $secret_iv = 'liftezyabcdefghijklmnopqrstuvwxyziv';
	
	
	public function loggedinUserId()

	{

		if (isset(Yii::$app->user->identity->profile)) {

			$uid = Yii::$app->user->identity->user_id;

		} else {

			$uid = Yii::$app->user->getId();

		}

		return $uid;

	}


    
	public function notifyMe($title,$link) {
         $model = new \app\models\Notifications();
         if(isset($title )&& !empty($link))
         {
            $model->created_at = date('d-M-y h:i');
            $model->status = 0;
            $model->read = '0';
            $model->view = '0';
            $model->title = $title;
            $model->link = Url::base(true).$link;
            $model->created_by = Yii::$app->user->identity->id;
            if($model->save())
            {
                return 1;
            }
         }
        
    }
    


	public function getCompaniesDirectory($id) {
        return "uploads". DIRECTORY_SEPARATOR . "companies" . DIRECTORY_SEPARATOR . $id . DIRECTORY_SEPARATOR  ;
    }
    public function getUnitsDirectory($id) {
        return "uploads". DIRECTORY_SEPARATOR . "units".DIRECTORY_SEPARATOR.$id . DIRECTORY_SEPARATOR  ;
    }
    public function getUserDirectory($id) {
        return "uploads". DIRECTORY_SEPARATOR . "users".DIRECTORY_SEPARATOR.$id . DIRECTORY_SEPARATOR  ;
    }
    public function getQuestionDirectory($id) {
        return "uploads". DIRECTORY_SEPARATOR . "course-cards".DIRECTORY_SEPARATOR. "questions".DIRECTORY_SEPARATOR.$id . DIRECTORY_SEPARATOR  ;
    }
    public function getAnswerDirectory($id) {
        return "uploads". DIRECTORY_SEPARATOR . "course-cards".DIRECTORY_SEPARATOR. "answers".DIRECTORY_SEPARATOR.$id . DIRECTORY_SEPARATOR  ;
    }
    public function getTestQuestionDirectory($id) {
        return "uploads". DIRECTORY_SEPARATOR . "course-test".DIRECTORY_SEPARATOR. "questions".DIRECTORY_SEPARATOR.$id . DIRECTORY_SEPARATOR  ;
    }
    public function getTestAnswerDirectory($id) {
		return "uploads". DIRECTORY_SEPARATOR . "course-test".DIRECTORY_SEPARATOR. "answers".DIRECTORY_SEPARATOR.$id . DIRECTORY_SEPARATOR  ;
	}





    
	public function getGymGalleryDirectory($id) {
		$gym = $this->getGymDirectory($id);
		return $gym . DIRECTORY_SEPARATOR . 'gallery' .  DIRECTORY_SEPARATOR ;
	}
	public function getProfileDirectory($id) {
		
		return "uploads". DIRECTORY_SEPARATOR . "users" .DIRECTORY_SEPARATOR . str_pad($id,6,0,STR_PAD_LEFT);
	}
	
	public function encrypt($string) {
        $output = false;
        $key = hash('sha256', $this->secret_key);
        $iv = substr(hash('sha256', $this->secret_iv), 0, 16);
        $output = openssl_encrypt($string, $this->encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
        return $output;
    }

    public function decrypt($string) {
        $output = false;
        $key = hash('sha256', $this->secret_key);
        $iv = substr(hash('sha256', $this->secret_iv), 0, 16);
        $output = openssl_decrypt(base64_decode($string), $this->encrypt_method, $key, 0, $iv);
        return $output;
    }

    public function currentLanguage() {
		$languages = Yii::$app->multilingual->getAllLanguages();
		$currentLanguageId = Yii::$app->multilingual->language_id;
		foreach ($languages as $language) 
		{
			if ($language->id === $currentLanguageId) {
				return $language;
			}
		}
	}
	 public function getTrackid() {
          $uniqueID='';
          
           
            $int = rand(0,25);
            $int2 = rand(0,25);
           $a_z = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
           $a_z2 = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
           $rand_letter2 = $a_z2[$int2];
           $rand_letter = $a_z[$int];
           $rand_letter = $rand_letter.$rand_letter2;
          
           $uniqueID=$rand_letter.mt_rand(100200, 99999000).$rand_letter2.rand(0,9); 
          return $uniqueID; 
    }

	
	function startsWith($haystack, $needle)
	{
		$length = strlen($needle);
		return (substr($haystack, 0, $length) === $needle);
	}
	
	public function getLabel($class, $text) {
		return "<p class='$class'>$text</p>";
	}
	
	public function currentCurrency() {
		$language = $this->currentLanguage();
		return $language->currency_symbol;
	}
	
	public function currentLocale() {
		$language = $this->currentLanguage();
		return $language->locale;
	}

    public function gender($string) {
        return $string == 'M' ? 'Male' : 'Female';
    }

    public function status($string) {
        return $string == '10' ? 'Active' : 'Disabled';
    }


    public function generatePasswd($numAlpha = 6, $numNonAlpha = 2) {
        $listAlpha = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $listNonAlpha = '!$@&';
        return str_shuffle(
                substr(str_shuffle($listAlpha), 0, $numAlpha) .
                substr(str_shuffle($listNonAlpha), 0, $numNonAlpha)
        );
    }
	
	public function generateRefID($numAlpha = 6) {
        $listAlpha = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
      
        return "EF-" .str_shuffle(
                substr(str_shuffle($listAlpha), 0, $numAlpha)
        );
    }
	
	public function generatePin($numAlpha = 6 ) {
        $listAlpha = '0123456789';
        return str_shuffle(
            substr(str_shuffle($listAlpha), 0, $numAlpha)
        );
    }
	public function sendOTPMessage($model)
	{
		$pin = $this->generatePin(6);
		$expiry = date("Y-m-d H:i:s", strtotime('+2 hours'));;
		$model->pin = $pin;
		$model->pin_expiry = $expiry;
		$model->save();
		
		$text = "One Time Password for Liftezy.com is : $pin";
		$number = array();
		$number[] = '91'.$model->mobile;
		return $this->sendSMS($number,$text);
		
	}
    public function sendMail($model, $mailFilePathName, $mailSubject, $mailTo) {
//        return true;
        return Yii::$app->mailer
                        ->compose([
                            'html' => $mailFilePathName . '-html',
                                ], [
                            'model' => $model])
                        ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
                        ->setTo($mailTo)
                        ->setSubject($mailSubject)
                        ->send();
    }

    public function getRoleName($id = "") {
        $id = $id == "" ? Yii::$app->user->getId() : $id;
		$roles = Yii::$app->authManager->getRolesByUser($id);
		if (!$roles) {
            return null;
        }

        reset($roles);
        /* @var $role \yii\rbac\Role */
        $role = $this->getRole($id);

        return $role->description;
    }
	
	public function getRole($id = "") {
        $id = $id == "" ? Yii::$app->user->getId() : $id;
		$roles = Yii::$app->authManager->getRolesByUser($id);
		if (!$roles) {
            return null;
        }

        reset($roles);
        /* @var $role \yii\rbac\Role */
        $role = current($roles);
        return $role;
    }

    public function getFullname() {
        $fullName = '';
        if (isset(Yii::$app->user->identity->profile)) {
            $fullName = Yii::$app->getUser()->getIdentity()->profile['name'];
        } else {
            $profile = \app\models\UserDetails::find()->where(['user_id' => Yii::$app->user->getId()])->one();
            $fullName = $profile->name;
        }

        if ($fullName !== null)
            return ucwords(strtolower($fullName));

        return false;
    }

    public function getUserDetailId() {
        $profile = \app\models\UserDetails::find()->where(['user_id' => Yii::$app->user->getId()])->one();
        if ($profile !== null)
            return $profile->id;
        return false;
    }

	public function humanTiming ($time)
	{
		$time = time() - $time; // to get the time since that moment
		$time = ($time<1)? 1 : $time;
		$tokens = array (
			31536000 => 'year',
			2592000 => 'month',
			604800 => 'week',
			86400 => 'day',
			3600 => 'hour',
			60 => 'minute',
			1 => 'second'
		);
		foreach ($tokens as $unit => $text) {
			if ($time < $unit) continue;
			$numberOfUnits = floor($time / $unit);
			return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
		}
	}
	
    public function money_format($num) {
        setlocale(LC_MONETARY, 'en_IN');
        $explrestunits = "";
        if (strlen($num) > 3) {
            $lastthree = substr($num, strlen($num) - 3, strlen($num));
            $restunits = substr($num, 0, strlen($num) - 3); // extracts the last three digits
            $restunits = (strlen($restunits) % 2 == 1) ? "0" . $restunits : $restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
            $expunit = str_split($restunits, 2);
            for ($i = 0; $i < sizeof($expunit); $i++) {
                // creates each of the 2's group and adds a comma to the end
                if ($i == 0) {
                    $explrestunits .= (int) $expunit[$i] . ","; // if is first value , convert into integer
                } else {
                    $explrestunits .= $expunit[$i] . ",";
                }
            }
            $thecash = $explrestunits . $lastthree;
        } else {
            $thecash = $num;
        }
        return $thecash; // writes the final format where $currency is the currency symbol.
    }
	
	

}
