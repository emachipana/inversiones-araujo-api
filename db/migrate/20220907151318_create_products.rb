class CreateProducts < ActiveRecord::Migration[7.0]
  def change
    create_table :products do |t|
      t.string :name
      t.references :sub_category, null: false, foreign_key: true
      t.references :user, null: false, foreign_key: true
      t.integer :stock
      t.float :price
      t.text :description
      t.string :marca

      t.timestamps
    end
  end
end
