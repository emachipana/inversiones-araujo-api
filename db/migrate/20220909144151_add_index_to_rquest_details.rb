class AddIndexToRquestDetails < ActiveRecord::Migration[7.0]
  def change
    add_index :request_details, [:product_id, :request_id], unique: true
  end
end
