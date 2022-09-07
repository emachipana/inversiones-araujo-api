class AddDefaultInZeroColumnStock < ActiveRecord::Migration[7.0]
  def change
    change_column :products, :stock, :integer, default: 0
  end
end
