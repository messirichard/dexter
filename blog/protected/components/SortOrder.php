<?php
/*
 * sort order
 * By Deory Pandu
 */
class SortOrder {

    public function sortButton($data, $controller, $nama_model='', $varGet='', $varFk='')
    {
        if ($varGet!='') {
            $str = '';
            $model = new $nama_model;
            if ($data->sort > '1') {
                $str .= CHtml::link("<i class=\"icon-arrow-up\"></i>", array('sort',"id"=>$data->id, 'to'=>'up', $varFk=>$varGet),array("rel"=>"tooltip", "data-original-title"=>"Up"));
                // $str.='<a href="'.CHtml::normalizeUrl(array('sort',"id"=>$data->id, 'to'=>'up', $varFk=>$varGet)).'" rel="tooltip", data-original-title="Up"><i class="icon-arrow-up"></i></a>';
            }
            if ($data->sort < count($model->findAll($varFk.' = :'.$varFk,array(':'.$varFk=>$varGet)))) {
                $str .= CHtml::link("<i class=\"icon-arrow-down\"></i>", array('sort',"id"=>$data->id, 'to'=>'down', $varFk=>$varGet),array("rel"=>"tooltip", "data-original-title"=>"Down"));
            }
        } else {
            $str = '';
            if ($data->sort > '1') {
                $str .= CHtml::link("<i class=\"icon-arrow-up\"></i>", array($controller."/sort", "id"=>$data->id, 'to'=>'up'),array("rel"=>"tooltip", "data-original-title"=>"Up"));
            }
            if ($data->sort < $data->count()) {
                $str .= CHtml::link("<i class=\"icon-arrow-down\"></i>", array($controller."/sort", "id"=>$data->id, 'to'=>'down'),array("rel"=>"tooltip", "data-original-title"=>"Down"));
            }
        }
        
        return $str;
        
    }
    public function sortUlang($nama_model, $varGet='', $varFk='')
    {
        if ($varGet!='') {
            $model = new $nama_model;
            $criteria=new CDbCriteria;
            $criteria->condition = $varFk.' = :'.$varFk;
            $criteria->params = array(':'.$varFk=>$varGet);
            $criteria->order = 'sort ASC';
            $data = $model->findAll($criteria);
            foreach ($data as $key => $value) {
                $model = $model->findByPk($value->id);
                $model->sort = $key+1;
                $model->save();
            }
        } else {
            $model = new $nama_model;
            $criteria=new CDbCriteria;
            $criteria->order = 'sort ASC';
            $data = $model->findAll($criteria);
            foreach ($data as $key => $value) {
                $model = $model->findByPk($value->id);
                $model->sort = $key+1;
                $model->save();
            }
        }
        
        return true;
    }
    public function sortTo($id, $to, $nama_model, $varGet='', $varFk='')
    {
        if ($varGet!='') {
            $model = new $nama_model;
            $id = $id;
            $to = $to;
            $data1 = $model->findByPk($id);
            $sort1 = $data1->sort;
            
            if ($to=="up") {
                $tambah = -1;
            } else {
                $tambah = 1;
            }
            
            $data2 = $model->find($varFk.' = :'.$varFk.' AND sort = :sort', array(':'.$varFk=>$varGet, 'sort'=>$sort1+$tambah));

            $data1->sort = $sort1+$tambah;
            $data1->scenario = 'urutkan';
            $data1->save();

            $data2->sort = $sort1;
            $data2->scenario = 'urutkan';
            $data2->save();
        } else {
            $model = new $nama_model;
            $data1 = $model->findByPk($id);
            $sort1 = $data1->sort;
            
            if ($to=="up") {
                $tambah = -1;
            } else {
                $tambah = 1;
            }
            
            $data2 = $model->find('sort = :sort', array('sort'=>$sort1+$tambah));
            
            $data1->sort = $sort1+$tambah;
            $data1->scenario = 'urutkan';
            $data1->save();
            
            $data2->sort = $sort1;
            $data2->scenario = 'urutkan';
            $data2->save();        
        }
        

        return true;
    }
}