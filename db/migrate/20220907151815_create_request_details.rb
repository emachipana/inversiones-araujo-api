class CreateRequestDetails < ActiveRecord::Migration[7.0]
  def change
    create_table :request_details do |t|
      t.references :product, null: false, foreign_key: true
      t.references :request, null: false, foreign_key: true
      t.string :quantity

      t.timestamps
    end
  end
end
