class AddIndexUniqToColumNameInCategories < ActiveRecord::Migration[7.0]
  def change
    add_index :categories, :name, unique: true
  end
end
