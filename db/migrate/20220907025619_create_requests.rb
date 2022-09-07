class CreateRequests < ActiveRecord::Migration[7.0]
  def change
    create_table :requests do |t|
      t.integer :document_type
      t.integer :document
      t.string :client_name
      t.string :email
      t.integer :phone
      t.string :address
      t.text :message

      t.timestamps
    end
  end
end
