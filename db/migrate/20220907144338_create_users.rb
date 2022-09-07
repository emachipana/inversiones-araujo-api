class CreateUsers < ActiveRecord::Migration[7.0]
  def change
    create_table :users do |t|
      t.integer :user_type
      t.string :username
      t.string :name
      t.string :password_digest
      t.string :token

      t.timestamps
    end
    add_index :users, :token, unique: true
    add_index :users, :username, unique: true
  end
end
