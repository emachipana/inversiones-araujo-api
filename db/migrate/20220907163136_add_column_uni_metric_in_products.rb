class AddColumnUniMetricInProducts < ActiveRecord::Migration[7.0]
  def change
    add_column :products, :unit_metric, :string
  end
end
