<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Task 2: Migration for Announcements Table
 * Creates the announcements table with required fields
 */
class CreateAnnouncementsTable extends Migration
{
    /**
     * Task 2: Create announcements table
     */
    public function up()
    {
        // Task 2: Define table structure
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'content' => [
                'type' => 'TEXT',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
        ]);
        
        // Task 2: Set primary key
        $this->forge->addKey('id', true);
        
        // Task 2: Create the announcements table
        $this->forge->createTable('announcements');
    }

    /**
     * Task 2: Drop announcements table
     */
    public function down()
    {
        $this->forge->dropTable('announcements');
    }
}

