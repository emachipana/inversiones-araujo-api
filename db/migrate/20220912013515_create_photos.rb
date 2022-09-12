class CreatePhotos < ActiveRecord::Migration[7.0]
  def change
    create_table :photos do |t|
      t.string :public_id
      t.string :url
      t.references :product, null: false, foreign_key: true

      t.timestamps
    end
    add_index :photos, :public_id, unique: true
  end
end
