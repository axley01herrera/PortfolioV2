<?php

namespace App\Controllers;

class Main extends BaseController
{
    protected $objRequest;
    protected $objEmail;
    protected $lang;

    public function __construct()
    {
        session();

        $emailConfig = array();
        $emailConfig['protocol'] = EMAIL_PROTOCOL;
        $emailConfig['SMTPHost'] = EMAIL_SMTP_HOST;
        $emailConfig['SMTPUser'] = EMAIL_SMTP_USER;
        $emailConfig['SMTPPass'] = EMAIL_SMTP_PASSWORD;
        $emailConfig['SMTPPort'] = EMAIL_SMTP_PORT;
        $emailConfig['SMTPCrypto'] = EMAIL_SMTP_CRYPTO;
        $emailConfig['mailType'] = EMAIL_MAIL_TYPE;

        # Services
        $this->objRequest = \Config\Services::request();
        $this->objEmail = \Config\Services::email($emailConfig);

        # Set Lang
        if ($this->objRequest->getGet('lang'))
            session()->set('lang', $this->objRequest->getGet('lang'));
        else if (session('lang') === null) {
            $acceptLanguage = $this->objRequest->getHeaderLine('accept-language');
            $browserLang = explode(',', $acceptLanguage);
            session()->set('lang', $browserLang[0]);
        }

        if (strpos(session('lang'), 'es') === 0)
            session()->set('lang', 'es');
        elseif (strpos(session('lang'), 'en') === 0)
            session()->set('lang', 'en');

        $this->lang = session('lang');
        $this->objRequest->setLocale($this->lang);
    }

    public function home()
    {
        $data = array();
        # menu
        $data['active'] = 'home';
        # lang
        $data['lang'] = $this->lang;
        # page 
        $data['route'] = base_url('Main/home');
        $data['page'] = "home/mainHome";
        $data['title'] = lang('Text.home_page_title');

        return view(TEMPLATE, $data);
    }

    public function certifications()
    {
        $data = array();
        # menu
        $data['active'] = 'certifications';
        # lang
        $data['lang'] = $this->lang;
        # page 
        $data['route'] = base_url('Main/certifications');
        $data['page'] = "certifications/mainCertifications";
        $data['title'] = lang('Text.cert_page_title');

        return view(TEMPLATE, $data);
    }

    public function projects()
    {
        $data = array();
        # menu
        $data['active'] = 'projects';
        # lang
        $data['lang'] = $this->lang;
        # page 
        $data['route'] = base_url('Main/projects');
        $data['page'] = "projects/mainProjects";
        $data['title'] = lang('Text.projects_page_title');

        return view(TEMPLATE, $data);
    }

    public function contact()
    {
        $data = array();
        # menu
        $data['active'] = 'contact';
        # lang
        $data['lang'] = $this->lang;
        # page 
        $data['route'] = base_url('Main/contact');
        $data['page'] = "contact/mainContact";
        $data['title'] = lang('Text.contact_page_title');
        # uniquid
        $data['uniquid'] = uniqid();

        return view(TEMPLATE, $data);
    }

    public function sendContactEmail()
    {
        $emailData = array();
        $emailData['name'] = htmlspecialchars(trim($this->objRequest->getPost('name')));
        $emailData['lastName'] = htmlspecialchars(trim($this->objRequest->getPost('lastName')));
        $emailData['email'] = htmlspecialchars(trim($this->objRequest->getPost('email')));
        $emailData['description'] = htmlspecialchars(trim($this->objRequest->getPost('description')));

        if (!empty($emailData['name']) && !empty($emailData['lastName']) && !empty($emailData['email'])) {
            $this->objEmail->setFrom(EMAIL_SMTP_USER, 'Portfolio');
            $this->objEmail->setTo('axley01herrera@gmail.com');
            $this->objEmail->setSubject('Contacto desde Portafolio');
            $this->objEmail->setMessage(view('email/contactEmail', $emailData));

            if ($this->objEmail->send(false)) {
                $result = array();
                $result['error'] = 0;
                $result['msg'] = 'success';
            } else {
                $result = array();
                $result['error'] = 1;
                $result['msg'] = 'error send email';
            }

            return json_encode($result);
        }
    }
}
