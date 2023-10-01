<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Migration_Usertype extends CI_Migration { 
	public function __construct()  { 
		parent::__construct(); 
		$this->load->dbforge();
	} 
    public function up() { 
            $this->dbforge->add_field(array(
            'id' => array(
                    'type' => 'BIGINT',                   
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
            ),
            'name' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100'
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('usertype');
    }//end up fn
	public function down()
    {
        $this->dbforge->drop_table('usertype');
    }//end down fn
}//endclass	