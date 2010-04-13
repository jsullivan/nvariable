class WelcomeController < ApplicationController

def index
  josh_auth = Twitter::HTTPAuth.new(TWEET['josh']['username'], TWEET['josh']['password'])
  mark_auth = Twitter::HTTPAuth.new(TWEET['mark']['username'], TWEET['mark']['password'])
  @josh_twitter = Twitter::Base.new(josh_auth)
  @mark_twitter = Twitter::Base.new(mark_auth)
end

end
