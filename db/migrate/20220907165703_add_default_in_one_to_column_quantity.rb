class AddDefaultInOneToColumnQuantity < ActiveRecord::Migration[7.0]
  def change
    change_column :quotation_details, :quantity, :integer, default: 1
  end
end
