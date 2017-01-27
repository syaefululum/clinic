<?php

namespace app\modules\v1\controllers;

use app\models\Person;
use yii\web\Response;
use yii\rest\ActiveController;

class PersonController extends \yii\web\Controller {

//    public function checkAccess($action, $model = null, $params = []) {
//        if (\Yii::$app->user->isGuest) {
//            throw new UnauthorizedHttpException;
//        }
//    }
    public $modelClass = 'app\models\Person';
    public $data = [
        'status' => 200,
        'data' => null
    ];

    public function actions() {
//        return array_merge(parent::actions(), [
//            'view' => null,
//        ]);
    }

    protected function verbs() {
        return [
            'index' => ['GET', 'HEAD'],
            'view' => ['GET', 'HEAD'],
            'create' => ['POST'],
            'update' => ['PUT', 'PATCH'],
            'delete' => ['DELETE'],
        ];
    }

    public function actionCreate() {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $model = new Person();
        $request = \Yii::$app->request;
        $model->name = $request->getBodyParam('name');
        $model->address = $request->getBodyParam('address');
        $model->phone = $request->getBodyParam('phone');
        $model->created_at = date("Y-m-d H:i:s");
        $model->updated_at = date("Y-m-d H:i:s");

        if ($model->save()) {
            $this->data['status'] = 201;
            $this->data['data'] = $model;
        } else {
            $this->data['status'] = 400;
        }
        return $request->bodyParams;
    }

    public function actionDelete($id) {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $this->data = $this->findModel($id);
        if ($this->data['status'] != 404) {
            $this->data['data']->delete();
        }
        return $this->data;
    }

    public function actionIndex() {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $person = Person::find()->all();
        $this->data['data'] = $person;
        return $this->data;
    }

    public function actionUpdate($id) {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $request = \Yii::$app->request;
        $model = new Person();
        if ($this->findModel($id)['status'] != 404) {
            $model = $this->data['data'];
        }
        $model->name = $request->getBodyParam('name');
        $model->address = $request->getBodyParam('address');
        $model->phone = $request->getBodyParam('phone');
        $model->updated_at = date("Y-m-d H:i:s");

        if ($model->save()) {
            $this->data['status'] = 200;
            $this->data['data'] = $model;
        } else {
            $this->data['status'] = 400;
        }
        return $this->data;
    }

    public function actionView($id) {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $this->data = $this->findModel($id);
        return $this->data;
    }

    protected function findModel($id) {
        if (($model = Person::findOne($id)) !== null) {
            $this->data['data'] = $model;
        } else {
            $this->data['status'] = 404;
        }
        return $this->data;
    }

}
