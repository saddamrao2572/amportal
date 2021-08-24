<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\base\Model;
use  yii\db\Expression;
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout="mainadmin";
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['login']);
        }
        else{
            return $this->render('admin');
        }
    }
	public function actionCalender()
    {
        $this->layout="mainadmin";
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['login']);
        }
        else{
            return $this->render('calender');
        }
    }
    public function actionTest() {
		$user = \app\models\User::findOne(1);
		
		Yii::$app->mailer->compose('user/confirmation',['user'=>$user])
			->setFrom(['saddam@softecventures.com'=>"Liftezy Team"])
			->setTo("saddamrao@gmail.com")
			->setSubject("Verify your email address for Liftezy")
			->send();
	}
	
    
    public function actionTestimap()
    {
       // $emails=array();
       // $trackIds=array();
      $mailbox = new \kekaadrenalin\imap\Mailbox(Yii::$app->imap->connection);
      $mailbox->readMailParts = false;
      $mailIds = $mailbox->searchMailBox(); // Gets all Mail ids.
      rsort($mailIds);
       foreach($mailIds as $mailId)
    {
        // Returns Mail contents
        $mail = $mailbox->getMail($mailId); 

        // Read mail parts (plain body, html body and attachments
     //   $mailObject = $mailbox->getMailParts($mail);
        
        // Array with IncomingMail objects
        echo "<pre>";
        
       // array_push($emails,$mail->subject);
        //array_push($emails,$mail->fromAddress);
        $uid= explode("-",$mail->subject);
       if(isset($uid[1])){
        $uid= explode(" ",$uid[1]);
        $ticketResponce=\app\models\Tickets::find()->where(['email'=>$mail->fromAddress,'unique_id'=>$uid[0]])->one();
        if(isset($ticketResponce) && !empty($ticketResponce))
        {
            echo 'Email Ticket is traced '.$ticketResponce->title;
            exit;
         }
       }
       
        

    }
    // print_r($emails);
//$tickets=\app\models
   //  echo $path;
       exit;
    }

    public function actionAdmin()
    {
        $this->layout="mainadmin";
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['login']);
        }
        else{
            return $this->render('admin');
        }
    }
    public function actionDashboard()
    {
        $this->layout="main";
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['login']);
        }
        else{
            return $this->render('index');
        }
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout="loginmain";
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }
    public function actionRegister()
    {
        $this->layout="loginmain";
      $model = new \app\models\User;
        $model->scenario = "signup";
        $userDetailsModel = new \app\models\UserDetails;
        if($model->load(Yii::$app->request->post())) {
            
            $transaction = Yii::$app->db->beginTransaction();
            $role = "user";
            $dbRole = \Yii::$app->authManager->getRole($role);
            
            $password = $model->password_hash;
            $model->setPassword($password);
            $model->password_repeat = $model->password_hash;
            $model->generateAuthKey();
            $model->generatePasswordResetToken();
            $userDetailsModel->load(Yii::$app->request->post());
        
            if($model->save()) {
                    
                $userRole = \Yii::$app->authManager->getRole('user');
                \Yii::$app->authManager->assign($userRole, $model->id);
                $userDetailsModel->load(Yii::$app->request->post());
                $userDetailsModel->user_id = $model->id;
                if($userDetailsModel->save())
                {
                    $transaction->commit();
                    Yii::$app->mailer->compose('user/confirmation',['user'=>$model])
                      ->setFrom(['team@srs.com'=>"SRS Questions Team"])
                      ->setTo($model->email)
                      ->setSubject("Verify your email address for SRS Questions")
                      ->send();
                    return $this->render('registersuccess');
                    
                  } 
                  else{
                  print_r($userDetailsModel->getErrors());
                }
             }
        else{
          print_r($model->getErrors());
        }
        $model->password_hash = "";
        $model->password_repeat= "";
      } 
      return $this->render('register',[
        'model'=>$model,
        'userDetailsModel' => $userDetailsModel
      ]);
    }   
    
    public function actionCreateUser()
    {
       // $this->layout="loginmain";
      $model = new \app\models\User;
        $model->scenario = "signup";
        $userDetailsModel = new \app\models\UserDetails;
        if($model->load(Yii::$app->request->post())) {
            
            $transaction = Yii::$app->db->beginTransaction();
            $role = $_POST['user_type'];
            $dbRole = \Yii::$app->authManager->getRole($role);
            
            $password = $model->password_hash;
            $model->setPassword($password);
            $model->password_repeat = $model->password_hash;
            $model->user_type = $_POST['user_type'];
            $model->status = 1;
            $model->generateAuthKey();
            $model->generatePasswordResetToken();
            $userDetailsModel->load(Yii::$app->request->post());
        
            if($model->save()) {
                    
                $userRole = \Yii::$app->authManager->getRole($role);
                \Yii::$app->authManager->assign($userRole, $model->id);
                $userDetailsModel->load(Yii::$app->request->post());
                $userDetailsModel->user_id = $model->id;
                if($userDetailsModel->save())
                {
                    $transaction->commit();
                    Yii::$app->session->setFlash('success', Yii::t('app',"User created successfully!"));
                    return $this->redirect('manage-users');
                    
                  } 
                  else{
                  print_r($userDetailsModel->getErrors());
                }
             }
        else{
          print_r($model->getErrors());
        }
        $model->password_hash = "";
        $model->password_repeat= "";
      } 
       $this->layout="mainadmin";
      return $this->render('add-new-user',[
        'model'=>$model,
        'userDetailsModel' => $userDetailsModel
      ]);
    }
     public function actionManageUsers()
    {
          $this->layout="mainadmin";
            $searchModel = new \app\models\UserDetailsSearch();
            $sql=" SELECT user_details.* , user.id AS uid , user.status AS ustatus 
                    From user_details 
                    LEFT OUTER JOIN user On user_details.user_id=user.id 
                    Where user.id != 1 ";
            $dataProvider = new ActiveDataProvider([
              'query' => \app\models\UserDetails::findBySql($sql),
              'pagination' => [
                    'pageSize' => 24,
                ],
              'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                    ],
                ],
            ]);

        return $this->render('manage-users', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    
     public function actionActivate($key)
    {
       $this->layout="mainfront";
      $user = \app\models\User::findByPasswordResetTokenSimple($key);
      $status = "success";
      $msg = "";
      if(isset($user))
      {
        $user->removePasswordResetToken();
        $user->status = \app\models\User::STATUS_ACTIVE;
        if($user->save()) {
          return $this->render('activateresult',['status'=>$status,'msg'=>$msg]);
        } else {
          
        }
      } 
    
    }
	  public function actionForgetpasswordemail()
    {
        $this->layout="loginmain";
        $model = new \app\models\User();
        // $model->scenario = "forget-password-email";
        
      	if($model->load(Yii::$app->request->post())) 
		{
   
    
			$model= \app\models\User::find()->where(['email'=>$model->email])->one();
             // echo '<pre>';
             // print_r($model->email);
    // exit;
			if(isset($model) && !empty($model))
		{
     // print_r(1);
    // exit;
			if($model->status==0)
			{
			Yii::$app->session->setFlash('danger', "You have not verified your account yet. Kindly check your mail box to activate account");
					
			return $this->redirect('/site/forgetpasswordemail');	
			}
             // print_r(2);
    // exit;
			$model->generatePasswordResetToken();
			$model->save();
			Yii::$app->mailer->compose('user/resetpass',['reset_token'=>$model->password_reset_token,'user'=>$model])
			->setFrom(['team@solemole.com'=>"SoleMole Team"])
			->setTo($model->email)
			->setSubject("Verification link for Password Reset request ")
			->send();
			 Yii::$app->session->setFlash('success', "An email with verification link is sent to your email account.Check your mailbox for details");
			return $this->redirect('/site/forgetpasswordemail');
		}
		else
		{
     // print_r(3);
    // exit;
			Yii::$app->session->setFlash('danger', "Wrong Email address.This email does not exist in our system.");
					
			return $this->redirect('/site/forgetpasswordemail');
		}
		}
        else
        {
            $this->layout='loginmain';
            return $this->render('forgetPasswordEmail', [
                'model' => $model,
            ]);
        }
        
        
        
        
        
        
    }


    public function actionForgetPassword($key)
    {
    $this->layout="loginmain";
        $auth_key = $key;
        
        $model = new \app\models\User();
        $model->scenario = "forget_password";
        
        $userModel = \app\models\User::findOne(['auth_key' => $auth_key]);
        
        if ($model->load(Yii::$app->request->post()))
        {
            $new_password = $model->new_password;
            
            $userModel->setPassword($new_password);
            
            if($userModel->save(false))
            {       
                \Yii::$app->session->setFlash('success', Yii::t('app', "Password updated successfully !"));
                return $this->redirect(['site/login']);
            }
            else
            {
                \Yii::$app->session->setFlash('error', Yii::t('app', "Error in updated password !"));
                return $this->redirect(['forget-password', 'key'=> $auth_key]);
            }
        }
        else
        {
            $this->layout = "loginmain";
            return $this->render('forgetPassword', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $this->layout="mainfront";
        $model = new \app\models\Contact();
        if (isset($_POST['btncontact'])) {
            $loginid = \Yii::$app->util->loggedinUserId();
            // print_r($_POST);exit();
            $model->name=$_POST['name'];
            $model->subject=$_POST['subject'];
            $model->mobile=$_POST['mobile'];
            $model->email=$_POST['email'];
            $model->description=$_POST['message'];
            $model->status=0;
            $model->created_at=date('Y-m-d');
            $model->user_id=$loginid;
            if ($model->save()) {
                // Yii::$app->session->setFlash('success', Yii::t('app'," Message Send Successfully"));
                return $this->refresh();
            }
            // Yii::$app->session->setFlash('contactFormSubmitted');

            
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $this->layout="mainfront";
        return $this->render('about');
    
    }
    public function actionPricing()
    {
        $this->layout="mainfront";
        return $this->render('pricing');
    }
    public function actionPrivacy()
    {
        $this->layout="mainfront";
        return $this->render('privacy');
    }

    public function actionSubcribe() 
    {
        $subcrib =new \app\models\Subcriber();
        if (isset($_POST)) {
          $subcrib->subcriber=$_POST['email'];
          $subcrib->created_at=date('Y-m-d');
          $subcrib->status=0;
          // print_r($subcriber);
          // exit();
          $emailvalid=\app\models\Subcriber::find()->where(['subcriber'=>$subcrib->subcriber])->one();
          if (!empty($emailvalid)) 
          {
             $email=$emailvalid->subcriber;
          }
          else
          {
            $email="";
          }
         
          
          if ($email != $subcrib->subcriber) 
          {
            
            if ($subcrib->save()) {
              Yii::$app->mailer->compose('subcribe/sub')
                ->setFrom(['team@oproctor.com'=>"Oproctor Team"])
                ->setTo($subcrib->subcriber)
                ->setSubject("Successfully Subcribed")
                ->send();
                 Yii::$app->session->setFlash('success', "You Subcribed successfully!");
                return $this->redirect(['/']);

            }
            else
            {
              Yii::$app->session->setFlash('danger', "Something went wrong !");
              return $this->redirect(['/']);
            }
          }
          else
            {
              Yii::$app->session->setFlash('danger', "You Are Already Subscribed To Our Site!");
              return $this->redirect(['/']);
            }
        }
        
    }
}
