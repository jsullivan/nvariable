class RemoveNullFromUser < ActiveRecord::Migration
  def self.up
    change_column :users, :email, :string
  end

  def self.down
    change_column :users, :email, :string, :null => false
  end
end
