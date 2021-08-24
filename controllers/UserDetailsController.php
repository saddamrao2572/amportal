<?php

namespace app\controllers;

use Yii;
use app\models\UserDetails;
use app\models\UserDetailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\base\Model;
/**
 * UserDetailsController implements the CRUD actions for UserDetails model.
 */
class UserDetailsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                // 'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['index' , 'view','delete','activate','deactivate','profile','update' ],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                    [
                        'actions' => ['profile','update' ,'view'],
                        'allow' => true,
                        'roles' => ['Admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['get'],
                ],
            ],
        ];
    }

    /**
     * Lists all UserDetails models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout="mainadmin";
        $searchModel = new UserDetailsSearch();
        $sql=" SELECT user_details.* , user.id AS uid , user.status AS ustatus 
                From user_details 
                LEFT OUTER JOIN user On user_details.user_id=user.id ";
        $dataProvider = new ActiveDataProvider([
          'query' => UserDetails::findBySql($sql),
          'pagination' => [
                'pageSize' => 24,
            ],
          'sort' => [
            'defaultOrder' => [
                'id' => SORT_DESC,
                ],
            ],
        ]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserDetails model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->layout="mainadmin";
        $id=Yii::$app->util->decrypt($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new UserDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserDetails();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing UserDetails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $loginid = \Yii::$app->util->loggedinUserId();
        $this->layout="mainadmin";
        $id=Yii::$app->util->decrypt($id);
        $model = $this->findModel($id);
        $olgimg=$model->profile_image;
        if ($model->load(Yii::$app->request->post())) {
            $model->created_at = date('d-M-y h:i');
            $model->status = 1;
            $model->user_id = $loginid;

            $imageFile = UploadedFile::getInstance($model,'profile_image');
            if(isset($imageFile)) 
            { 
                $fileName =rand(1000,99999999).'.'. $imageFile->extension; 
                $model->profile_image = $fileName; 
            }else
            {
                $model->profile_image=$olgimg;
            }


            if($model->save())
            {

                $directory = Yii::$app->util->getUserDirectory($model->id);             
                if (!is_dir($directory))
                { 
                  FileHelper::createDirectory($directory);
                } 
                if(isset($imageFile)) 
                {     
                    $filePath = $directory . $fileName; 
                    $imageFile->saveAs($filePath);
                }

                $title='Profile Updated successfully!';
                $link=Url::to(['user-details/profile']);
                $msg=Yii::$app->util->notifyMe($title,$link);
                if ($msg) {
                    Yii::$app->session->setFlash('success', Yii::t('app',"Profile updated successfully!"));
                    return $this->redirect(['profile']);  
                }else
                {
                    print_r($msg->getErrors());exit();
                }                  
            }else
            {
                print_r($model->getErrors());
                exit;
            }
            // return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionProfile()
    {
        $loginid = \Yii::$app->util->loggedinUserId();
        $this->layout="mainadmin";
        // $id=Yii::$app->util->decrypt($id);
        $model = $this->findModel($loginid);
        return $this->render('profile', [
            'model' => $model,
        ]);

    }


    public function actionActivate($id)
    {
        // $loginid = \Yii::$app->util->loggedinUserId();
        $this->layout="mainadmin";
        $id=Yii::$app->util->decrypt($id);
        $model = \app\models\User::find()->Where(['id' => $id])->one();
        if (!empty($model)) {
            $model->status=1;
            if ($model->save()) {
                Yii::$app->session->setFlash('success', Yii::t('app',"User Activated!"));
                    return $this->redirect(Yii::$app->request->referrer);
            }else
            {
                print_r($model->getErrors());exit();
            }
        }else
        {
            Yii::$app->session->setFlash('info', Yii::t('app',"User Not Found!"));
            return $this->redirect(Yii::$app->request->referrer);
        }
        
    }

    public function actionDeactivate($id)
    {
        // $loginid = \Yii::$app->util->loggedinUserId();
        $this->layout="mainadmin";
        $id=Yii::$app->util->decrypt($id);
        $model = \app\models\User::find()->Where(['id' => $id])->one();
        if (!empty($model)) {
            $model->status=0;
            if ($model->save()) {
                Yii::$app->session->setFlash('success', Yii::t('app',"User Deactivated!"));
                    return $this->redirect(Yii::$app->request->referrer);
            }else
            {
                print_r($model->getErrors());exit();
            }
        }
        else
        {
            Yii::$app->session->setFlash('info', Yii::t('app',"User Not Found!"));
            return $this->redirect(Yii::$app->request->referrer);
        }
    }

    /**
     * Deletes an existing UserDetails model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->layout="mainadmin";
        $id=Yii::$app->util->decrypt($id);
        $this->findModel($id)->delete();
        $model=\app\models\User::find()->Where(['id' => $id])->one();
        if (!empty($model)) {
            $model->delete();
        }

        Yii::$app->session->setFlash('success', Yii::t('app',"User Deleted!"));
        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Finds the UserDetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserDetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserDetails::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
