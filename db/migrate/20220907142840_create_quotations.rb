class CreateQuotations < ActiveRecord::Migration[7.0]
  def change
    create_table :quotations do |t|
      t.integer :document_type, default: 0
      t.integer :document
      t.string :client_name
      t.string :email
      t.integer :phone
      t.string :address
      t.float :total, default: 0

      t.timestamps
    end
  end
end
