class AddDefaultInZeroColumnUserType < ActiveRecord::Migration[7.0]
  def change
    change_column :users, :user_type, :integer, default: 0
  end
end
