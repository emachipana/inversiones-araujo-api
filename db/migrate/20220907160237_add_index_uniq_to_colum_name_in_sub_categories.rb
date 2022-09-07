class AddIndexUniqToColumNameInSubCategories < ActiveRecord::Migration[7.0]
  def change
    add_index :sub_categories, :name, unique: true
  end
end
