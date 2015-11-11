class UserController < ApplicationController

  layout "application"
  require 'digest/sha1'
  include UserHelper

  def index
  	if auth()
      redirect_to user_chat_path
    else
      render :index
    end
    # Rails.logger.debug @users.inspect
  end


  def register
    if request.post?
      if User.checkCreateUser(params[:email])
        redirect_to user_register_path
      elsif checkConfirmPass()
        user = User.createUser(first_name: params[:username],email_login: params[:email],password: Digest::SHA1.hexdigest(params[:password]),status: '1')
        createSession(user.id)
        redirect_to root_path
      else
        redirect_to user_register_path
      end
    end
  end

 
  #login
  def login
  	@user = User.checkUser(params[:email],params[:password])
  	if @user
      createSession(@user.id)  
    else
      redirect_to root_path
  	end
  end

  #logout 
  def logout
    if auth()
      User.updateOnOff(session[:user], 0)
      reset_session
    end
    redirect_to root_path
  end




  # validates :username, presence: true
  # # using valid_email
  # validates :email, presence: true, email: true
  # validates :subdomain,
  #           exclusion: { in: %w(www us ca jp),
  #           message: "%{value} is reserved" }
  # # using validate_timeliness with custom date format

end
