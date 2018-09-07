<?php

/**
 * This is the model class for table "ticket_order_history".
 *
 * The followings are the available columns in table 'ticket_order_history':
 * @property integer $id
 * @property integer $ticket_order_id
 * @property string $change_by
 * @property integer $change_to
 * @property string $date_time
 */
class TicketOrderHistory extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ticket_order_history';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ticket_order_id, change_by, change_to, date_time', 'required'),
			array('ticket_order_id, change_to', 'numerical', 'integerOnly'=>true),
			array('change_by', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, ticket_order_id, change_by, change_to, date_time', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'ticket_order_id' => 'Ticket Order',
			'change_by' => 'Change By',
			'change_to' => 'Change To',
			'date_time' => 'Date Time',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('ticket_order_id',$this->ticket_order_id);
		$criteria->compare('change_by',$this->change_by,true);
		$criteria->compare('change_to',$this->change_to);
		$criteria->compare('date_time',$this->date_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TicketOrderHistory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public static function getStatus($id)
	{
		$data = TicketOrderHistory::model()->findAll('ticket_order_id = :id ORDER BY date_time DESC', array(':id'=>$id));
		$message = '';
		if (count($data) > 0) {
			$message = 'Status Di Ubah Oleh: <br>';
			foreach ($data as $key => $value) {
				$message = $message.$value->change_by.' ke status '.TicketOrderHistory::getStatusMessage($value->change_to).' pada '.$value->date_time.'<br>';
			}
		}
		return $message;
	}
	public static function getStatusMessage($id)
	{
		switch ($id) {
			case '1':
				$message = 'Complete';
				break;
			case '5':
				$message = 'Claimed';
				break;
			case '3':
				$message = 'Canceled';
				break;
			
			default:
				$message = 'Lainnya';
				break;
		}
		return $message;
	}
}
