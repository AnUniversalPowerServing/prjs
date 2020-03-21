package anups.cmt.module.auth.user.register;

public interface UserRegisterForm {
	
  public static final String BADGE_GENINFO="badge-auth-reg-genInfo";
  public static final String BADGE_SETPWD="badge-auth-reg-setPassword";
  public static final String BADGE_SECURITYQ="badge-auth-reg-securityQ";
  
  public static final String BADGE_GENINFO_TITLE="Provide Basic Information to create Account";
  public static final String BADGE_SETPWD_TITLE="Set Password to access your Account";
  public static final String BADGE_SECURITYQ_TITLE="Choose 3 Security Questions to secure Account";
  
  public static final String BADGE_GENINFO_DIVISION="auth-reg-genInfo";
  public static final String BADGE_SETPWD_DIVISION="auth-reg-setPassword";
  public static final String BADGE_SECURITYQ_DIVISION="auth-reg-securityQ";
  
  /* GENINFO: */
  public static final String FORM_GENINFO_ALERT_WARNERRORMSG="auth-reg-genInfo-warnErrorMsg"; 
  public static final String FORM_GENINFO_ALERTMSG_EMPTYFORM="Error! Please provide Surname, Name, Gender, Mobile Number";
  
  public static final String FORM_GENINFO_INPUT_SURNAME="auth-reg-genInfo-surName";
  public static final String FORM_GENINFO_INPUT_NAME="auth-reg-genInfo-name";
  public static final String FORM_GENINFO_SELECT_GENDER="auth-reg-genInfo-gender";
  public static final String FORM_GENINFO_DROPDOWN_MOBILECODE="auth-reg-genInfo-mobilecode";
  public static final String FORM_GENINFO_INPUT_MOBILE="auth-reg-genInfo-mobile";
  public static final String FORM_GENINFO_BUTTON_MOBILEVERIFY="auth-reg-genInfo-mobile-verifyBtn";
  public static final String FORM_GENINFO_BUTTON_MOBILECHANGE="auth-reg-genInfo-mobile-changeBtn";
  public static final String FORM_GENINFO_INPUT_OTPCODE="auth-reg-genInfo-otpcode";
  public static final String FORM_GENINFO_BUTTON_MOBILEOTPVALIDATE="auth-reg-genInfo-mobile-validateOTPBtn";
  public static final String FORM_GENINFO_BUTTON_FORMMOVENEXT="auth-reg-genInfo-moveNextForm";
  
  /* SETPWD: */
  public static final String FORM_SETPWD_ALERT_WARNERRORMSG="auth-reg-lock-warnErrorMsg";
  public static final String FORM_SETPWD_ALERTMSG_EMPTYFORM="Error! Please provide Surname, Name, Gender, Mobile Number";
  public static final String FORM_SETPWD_ALERTMSG_MISSINGPWD="Error! Your Password should be atleast 8-charaters";
  public static final String FORM_SETPWD_ALERTMSG_PWDCONFIRMPWDNOMATCH="Error! Password and Confirm Password doesn't Match";
  
  public static final String FORM_SETPWD_INPUT_PASSWORD="auth-reg-lock-password";
  public static final String FORM_SETPWD_INPUT_CONFIRMMPASSWORD="auth-reg-lock-confirmPassword";
  public static final String FORM_SETPWD_BUTTON_FORMMOVENEXT="auth-reg-lock-moveNextForm";

  /* SECURITYQ: */
  public static final String FORM_SECURITYQ_ALERT_WARNERRORMSG="auth-reg-sQ-warnErrorMsg";
  public static final String FORM_SECURITYQ_ALERTMSG_EMPTYFORM="Error! Please provide Security Question #1, Answer for Security Question #1, Security Question #2, Answer for Security Question #2, Security Question #3, Answer for Security Question #3";
  
  public static final String FORM_SECURITYQ_INPUT_SQ1="auth-reg-securityQ-sQ1";
  public static final String FORM_SECURITYQ_INPUT_A1="auth-reg-securityQ-a1";
  public static final String FORM_SECURITYQ_INPUT_SQ2="auth-reg-securityQ-sQ2";
  public static final String FORM_SECURITYQ_INPUT_A2="auth-reg-securityQ-a2";
  public static final String FORM_SECURITYQ_INPUT_SQ3="auth-reg-securityQ-sQ3";
  public static final String FORM_SECURITYQ_INPUT_A3="auth-reg-securityQ-a3";
  public static final String FORM_SECURITYQ_BUTTON_CREATEACCOUNT="auth-reg-securityQ-createAccount";
  
}
