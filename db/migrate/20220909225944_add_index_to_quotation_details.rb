class AddIndexToQuotationDetails < ActiveRecord::Migration[7.0]
  def change
    add_index :quotation_details, [:product_id, :quotation_id], unique: true
  end
end
