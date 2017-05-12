<?php

namespace app\controllers;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseJson;
use app\models\test\Container;
use app\models\test\Test;
use yii\filters\AccessControl;
use app\models\test\Specialty;
use Yii;

class StatisticController extends \yii\web\Controller
{
    public function behaviors()
        {
            return [
                'corsFilter' => [
                    'class' => \yii\filters\Cors::className(),
                ],
                'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'roles' => ['admin'],
                        'allow' => true
                    ]
                ]
            ]
            ];
        }

    private $arrCourses = [
                [
                    'course' => 1,
                    'count' => 0,
                    'averageScore' => 0,
                    'academicPerfomance' => 0,
                    'quality' => 0
                ],
                [
                    'course' => 2,
                    'count' => 0,
                    'averageScore' => 0,
                    'academicPerfomance' => 0,
                    'quality' => 0
                ], 
                [
                    'course' => 3,
                    'count' => 0,
                    'averageScore' => 0,
                    'academicPerfomance' => 0,
                    'quality' => 0
                ], 
                [
                    'course' => 4,
                    'count' => 0,
                    'averageScore' => 0,
                    'academicPerfomance' => 0,
                    'quality' => 0
                ]
            ];

    private $arrGroupes = [];
    

    public function actionIndex()
    {
    	$get = Yii::$app->request->get('Container');
    	if ($get['year'] && $get['month'])
    	{

            foreach (Specialty::find()->all() as $value) {
                $this->arrGroupes[$value->id] = [
                    'specialty_id' => $value->id,
                    'groupName' => $value->name,
                    'count' => 0,
                    'averageScore' => 0,
                    'academicPerfomance' => 0,
                    'quality' => 0
                ];
            }

    		$container = Container::findOne(['year' => $get['year'], 'month' => $get['month']]);
            if (!$container) 
            {
                    $container = new Container;
                    $error = 'not found';
                    return $this->render('index', compact('container', 'error'));
            }
    		$tests = $container->hasMany(Test::className(), ['container_id' => 'id']);
    		$tests2 = Test::findAll(['container_id' => $container->id]);

    		$courses = ArrayHelper::getColumn($tests2, function($element){
                $specialty = Specialty::findOne(['id' => $element['specialty_id']]);
    			return [
    			    'course' => $element['course'],
                    'group' => $specialty->name,  //$element['groupName'],
                    'specialty_id' => $specialty->id,
    			    'groupName' => $specialty->name.'-'.$element['groupNumber'],
    			    'averageScore' => $element['averageScore'],
    			    'academicPerfomance' => $element['academicPerfomance'],
    			    'quality' => $element['quality']
    			    ];
    		});

    		$arrCourses = $this->fillArrCourses($courses, $this->arrCourses);
    		$arrCourses = $this->sortArr($arrCourses);

            $arrGroupes = $this->fillArrGroupes($courses, $this->arrGroupes);
            $arrGroupes = $this->sortArr($arrGroupes);

    		return $this->render('index', compact('container', 'tests', 'arrGroupes', 'arrCourses'));
    	}
    	$container = new Container;
        return $this->render('index', compact('container'));
    }

    public function actionParams()
    {

    }

    public function sortArr($array)
    {
    	foreach ($array as $key => $value) {
            if ($value['count'] == 0) continue;
    		$array[$key]['averageScore'] /= $value['count'];
    		$array[$key]['averageScore'] = round($array[$key]['averageScore'], 1);

    		$array[$key]['academicPerfomance'] /= $value['count'];
            $array[$key]['academicPerfomance'] = round($array[$key]['academicPerfomance']);

    		$array[$key]['quality'] /= $value['count'];
            $array[$key]['quality'] = round($array[$key]['quality']);
    		//yield $value;
    	}
    	return $array;
    }

    public function fillArrGroupes($arr, $arrGroupes)
    {

        foreach ($arr as $elem) {
            $arrGroupes[$elem['specialty_id']]['count']++;
            $arrGroupes[$elem['specialty_id']]['averageScore'] += $elem['averageScore'];
            $arrGroupes[$elem['specialty_id']]['academicPerfomance'] += $elem['academicPerfomance'];
            $arrGroupes[$elem['specialty_id']]['quality'] += $elem['quality'];
        }
    		return $arrGroupes;
    }

    public function fillArrCourses($arr, $arrCourses)
    {
        foreach ($arr as $elem) {
                switch ($elem['course']) {
                    case '1':
                        $arrCourses[0]['count']++;
                        $arrCourses[0]['averageScore'] += $elem['averageScore'];
                        $arrCourses[0]['academicPerfomance'] += $elem['academicPerfomance'];
                        $arrCourses[0]['quality'] += $elem['quality'];
                        break;
                    case '2':
                        $arrCourses[1]['count']++;
                        $arrCourses[1]['averageScore'] += $elem['averageScore'];
                        $arrCourses[1]['academicPerfomance'] += $elem['academicPerfomance'];
                        $arrCourses[1]['quality'] += $elem['quality'];
                        break;
                    case '3':
                        $arrCourses[2]['count']++;
                        $arrCourses[2]['averageScore'] += $elem['averageScore'];
                        $arrCourses[2]['academicPerfomance'] += $elem['academicPerfomance'];
                        $arrCourses[2]['quality'] += $elem['quality'];
                        break;
                    case '4':
                        $arrCourses[3]['count']++;
                        $arrCourses[3]['averageScore'] += $elem['averageScore'];
                        $arrCourses[3]['academicPerfomance'] += $elem['academicPerfomance'];
                        $arrCourses[3]['quality'] += $elem['quality'];
                        break;
                    
                    default:
                        # code...
                        break;
                }
            }
            return $arrCourses;
    }

    public function actionFormdoc()
    {

        foreach (Specialty::find()->all() as $value) {
                $this->arrGroupes[$value->id] = [
                    'specialty_id' => $value->id,
                    'groupName' => $value->name,
                    'count' => 0,
                    'averageScore' => 0,
                    'academicPerfomance' => 0,
                    'quality' => 0
                ];
            }

        $post = Yii::$app->request->post('Container');
        if ($post['year'] && $post['month'])
        {
            $container = Container::findOne(['year' => $post['year'], 'month' => $post['month']]);
            if (!$container) 
            {
                    return (print_r($post['year']."  ".$post['month']));
            }
            $tests = $container->hasMany(Test::className(), ['container_id' => 'id']);
            $tests2 = Test::findAll(['container_id' => $container->id]);

            $courses = ArrayHelper::getColumn($tests2, function($element){
                $specialty = Specialty::findOne(['id' => $element['specialty_id']]);
                return [
                    'course' => $element['course'],
                    'group' => $specialty->name,
                    'specialty_id' => $specialty->id,
                    'groupName' => $specialty->name.'-'.$element['groupNumber'],
                    'averageScore' => $element['averageScore'],
                    'academicPerfomance' => $element['academicPerfomance'],
                    'quality' => $element['quality']
                    ];
            });

            $arrCourses = $this->fillArrCourses($courses, $this->arrCourses);
            $arrCourses = $this->sortArr($arrCourses);

            $arrGroupes = $this->fillArrGroupes($courses, $this->arrGroupes);
            $arrGroupes = $this->sortArr($arrGroupes);

            $phpWord = new \PhpOffice\PhpWord\PhpWord();
            $phpWord->setDefaultFontName('Times New Roman');
            $phpWord->setDefaultFontSize(14);

            $properties = $phpWord->getDocInfo();
            $properties->setCreator('Sanya');
            $properties->setCompany('Roga i Kopita');
            $properties->setTitle('Titul');
            $properties->setDescription('Opisanie');
            $properties->setCategory('Kategorii');
            $properties->setLastModifiedBy('Sanya');
            $properties->setCreated(time());
            $properties->setModified(time());
            $properties->setSubject('My subj');
            $properties->setKeywords('blah');

            $sectionStyle = [
                'orientation' => 'portrait',
                'marginTop' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip(2),
                'marginBottom' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip(2),
                'marginLeft' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip(2.5),
                'marginRight' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip(1.5),
                'colsNum' => 1,
                'pageNumberingStart' => 1,
                ];

            $section = $phpWord->addSection($sectionStyle);
            $baseFontStyle = array('name'=>'Times New Roman', 'size'=>14, 'color'=>'000000', 'bold'=>false, 'italic'=>false);
            $headerFontStyle = array('name'=>'Times New Roman', 'size'=>18, 'color'=>'000000', 'bold'=>true, 'italic'=>false);
            $parStyle = array('align'=>'center','spaceBefore'=>10);

            //OUTPUT
            $month = $this->getMonth($post['month']);
            $text = 'Анализ контрольной недели, проведенной в колледже радиоэлектроники имени П.Н. Яблочкова в '.$month.' '.$post['year'].' года';
            $section->addText(htmlspecialchars($text), $headerFontStyle, $parStyle);
            $text = 'По итогам контрольной недели (1 курс) общая успеваемость составила '.$arrCourses[0]['academicPerfomance'].'%; качество знаний — '.$arrCourses[0]['quality'].'%.';
            $section->addText(htmlspecialchars($text));
            $text = 'По итогам контрольной недели (2 курс) общая успеваемость составила '.$arrCourses[1]['academicPerfomance'].'%; качество знаний — '.$arrCourses[1]['quality'].'%.';
            $section->addText(htmlspecialchars($text));
            $text = 'По итогам контрольной недели (3 курс) общая успеваемость составила '.$arrCourses[2]['academicPerfomance'].'%; качество знаний — '.$arrCourses[2]['quality'].'%.';
            $section->addText(htmlspecialchars($text));
            $text = 'По специальностям качество знаний и общая успеваемость составили:';
            $section->addText(htmlspecialchars($text));

            $tableStyle = array(
                'borderColor' => '000000',
                'borderSize'  => 12,
                'cellMargin'  => 10,
                'align' => 'center'
            );
            $cellStyle = array(
                'align' => 'center',
                'valign' => 'center'
                );
            $table = $section->addTable($tableStyle);
            $rowHeight = 0;
            $cellWidth = 700;
            $table->addRow($rowHeight);
            $table->addCell($cellWidth)->addText('', 0, $cellStyle);
            $table->addCell($cellWidth)->addText('Качество', ['bold' => true], $cellStyle);
            $table->addCell($cellWidth)->addText('Успеваемость', ['bold' => true], $cellStyle);
            foreach ($arrGroupes as $key => $value) {
                $table->addRow($rowHeight);
                $table->addCell($cellWidth)->addText($value['groupName'], 0, $cellStyle);
                $table->addCell($cellWidth)->addText($value['quality'].'%', 0, $cellStyle);
                $table->addCell($cellWidth)->addText($value['academicPerfomance'].'%', 0, $cellStyle);
            }
            //$table->addRow([$height], [$rowStyle]);
            //$cell = $table->addCell($width, [$cellStyle]);


            

            
//ob_clean();
            header("Content-Description: File Transfer");
            header('Content-Disposition: attachment; filename="first.docx"');
            header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
            header('Content-Transfer-Encoding: binary');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Expires: 0');
            $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord,'Word2007');
            $objWriter->save("php://output");
            
            

            //return "OOO";//$this->render('index', compact('container', 'tests', 'arrGroupes', 'arrCourses'));
        }
        //return "KEK";
        //$container = new Container;
        //return $this->render('index', compact('container'));
    }

    public function getMonth($get)
    {
        $month = '';
            switch ($get) {
                case 1:
                    $month = 'январе';
                    break;
                case 2:
                    $month = 'феврале';
                    break;
                case 3:
                    $month = 'марте';
                    break;
                case 4:
                    $month = 'апреле';
                    break;
                case 5:
                    $month = 'мае';
                    break;
                case 6:
                    $month = 'июне';
                    break;
                case 7:
                    $month = 'июле';
                    break;
                case 8:
                    $month = 'августе';
                    break;
                case 9:
                    $month = 'сентябре';
                    break;
                case 10:
                    $month = 'октябре';
                    break;
                case 11:
                    $month = 'ноябре';
                    break;
                case 12:
                    $month = 'декабре';
                    break;
                
                default:
                    # code...
                    break;
            }
        return $month;
    }

    public function actionJson()
    {

        foreach (Specialty::find()->all() as $value) {
                $this->arrGroupes[$value->id] = [
                    'specialty_id' => $value->id,
                    'groupName' => $value->name,
                    'count' => 0,
                    'averageScore' => 0,
                    'academicPerfomance' => 0,
                    'quality' => 0
                ];
            }

        $container = Container::find()->all();
        $tests = Test::findAll(['container_id' => $container[0]->id]);
        $result = [];

        foreach ($container as $key => $value) {
            $data['date'] = $value->year.'.'.str_pad($value->month, 2, '0', STR_PAD_LEFT).'.'.'25';
            $tests = Test::findAll(['container_id' => $value->id]);

            $courses = ArrayHelper::getColumn($tests, function($element){
                $specialty = Specialty::findOne(['id' => $element['specialty_id']]);
                return [
                    'course' => $element['course'],
                    'group' => $specialty->name,
                    'specialty_id' => $specialty->id,
                    'groupName' => $specialty->name.'-'.$element['groupNumber'],
                    'averageScore' => $element['averageScore'],
                    'academicPerfomance' => $element['academicPerfomance'],
                    'quality' => $element['quality']
                    ];
            });

            $arrCourses = $this->fillArrCourses($courses, $this->arrCourses);
            $arrCourses = $this->sortArr($arrCourses);
            $data['courses']['data'] = $arrCourses;

            $arrGroupes = $this->fillArrGroupes($courses, $this->arrGroupes);
            $arrGroupes = $this->sortArr($arrGroupes);
            $data['groupes']['data'] = $arrGroupes;

            $result[] = $data;
        }

        usort($result, function($a, $b) {
            /*$aDate = date_create_from_format('d.m.y', $a['date']);
            $bDate = date_create_from_format('d.m.y', $b['date']);*/
            if ($a['date'] == $b['date']) return 0;

            return ($a['date'] < $b['date']) ? -1 : 1;
        });
        header('Content-Type: application/json');
        return BaseJson::encode($result);
    }

}
