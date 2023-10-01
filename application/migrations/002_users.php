<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
class Migration_Users extends CI_Migration { 
    public function up() { 
            $this->dbforge->add_field(array(
            'id' => array(
                    'type' => 'INT',                    
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
            ),
            'name' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '150'
            ),
            'email' => array(
                    'type' => 'VARCHAR',
					'constraint' => '100',
                    'null' => FALSE
            ),
			'address'=>array(
                    'type' => 'VARCHAR',
					'constraint' => '150',
                    'null' => TRUE
            ),
			'dob'=>array(
                    'type' => 'VARCHAR',
					'constraint' => '100',
                    'null' => FALSE
            ),
			'image'=>array(
                    'type' => 'VARCHAR',
					'constraint' => '100',
                    'null' => TRUE
            ),
			'gender'=>array(
                    'type' => 'VARCHAR',
					'constraint' => '60'
            ),
			'phone'=>array(
                    'type' => 'VARCHAR',
					'constraint' => '100',
                    'null' => TRUE
            ),
			'password'=>array(
                    'type' => 'VARCHAR',
					'constraint' => '50',
                    'null' => FALSE
            ),
			'usertype_id'=>array(
                    'type' => 'BIGINT',					
                    'null' => FALSE
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users');
    }

    public function down()
    {
        $this->dbforge->drop_table('users');
    }
}