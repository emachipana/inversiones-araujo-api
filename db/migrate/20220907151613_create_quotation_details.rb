class CreateQuotationDetails < ActiveRecord::Migration[7.0]
  def change
    create_table :quotation_details do |t|
      t.references :product, foreign_key: true
      t.references :quotation, null: false, foreign_key: true
      t.integer :quantity
      t.float :subtotal, default: 0
      
      t.timestamps
    end
  end
end
