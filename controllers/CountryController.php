<?php
namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Country;

class CountryController extends Controller
{
    /**
     * http://yii2.bot.net/index.php?r=country%2Findex
     * @return string
     */
    public function actionIndex()
    {
        $query = Country::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $countries = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $this->getView()->registerMetaTag([
            'name' => 'description',
            'content' => 'Ниипаца крутой сайтец на Yii2.'
        ]);
        $this->getView()->registerMetaTag([
            'name' => 'keywords',
            'content' => 'Yii2. Learn.'
        ]);

        $title = 'Title-Страны';
        // Усановка title. Способ 1.
        $this->getView()->title = $title;

        return $this->render('index', [
            'countries' => $countries,
            'pagination' => $pagination,
            'h1' => 'Страны'
            // Усановка title. Способ 2.
            //'title' => $title
        ]);
    }
}