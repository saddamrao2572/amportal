<?php

namespace app\controllers;

/**
* This is the class for controller "CompanyController".
*/
use yii;
class CompanyController extends \app\controllers\base\CompanyController
{
	
public function actionCreate()
{
$model = new \app\models\Company;

try {
if ($model->load($_POST) && $model->save()) {
    Yii::$app->session->setFlash('success', Yii::t('app',"Company created successfully!"));
return $this->redirect(['index']);
} elseif (!\Yii::$app->request->isPost) {
$model->load($_GET);
}
} catch (\Exception $e) {
$msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
$model->addError('_exception', $msg);
}
return $this->render('create', ['model' => $model]);
}

/**
* Updates an existing Company model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id
* @return mixed
*/
public function actionUpdate($id)
{
$model = $this->findModel($id);

if ($model->load($_POST) && $model->save()) {
     Yii::$app->session->setFlash('success', Yii::t('app',"Company updated successfully!"));
return $this->redirect(Url::previous());
} else {
return $this->render('update', [
'model' => $model,
]);
}
}

/**
* Deletes an existing Company model.
* If deletion is successful, the browser will be redirected to the 'index' page.
* @param integer $id
* @return mixed
*/
public function actionDelete($id)
{
try {
$this->findModel($id)->delete();
} catch (\Exception $e) {
$msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
\Yii::$app->getSession()->addFlash('error', $msg);
 Yii::$app->session->setFlash('danger', Yii::t('app',"Company deleted successfully!"));
return $this->redirect(Url::previous());
}

// TODO: improve detection
$isPivot = strstr('$id',',');
if ($isPivot == true) {
return $this->redirect(Url::previous());
} elseif (isset(\Yii::$app->session['__crudReturnUrl']) && \Yii::$app->session['__crudReturnUrl'] != '/') {
Url::remember(null);
$url = \Yii::$app->session['__crudReturnUrl'];
\Yii::$app->session['__crudReturnUrl'] = null;

return $this->redirect($url);
} else {
return $this->redirect(['index']);
}
}


}