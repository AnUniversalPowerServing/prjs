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
  public static final String FORM_GENINFO_INPUT_GENDER="auth-reg-genInfo-gender";
  public static final String FORM_GENINFO_INPUT_MOBILE="auth-reg-genInfo-mobile";
  public static final String FORM_GENINFO_BUTTON_MOBILEVERIFY="auth-reg-genInfo-mobile-verifyBtn";
  
  
}
