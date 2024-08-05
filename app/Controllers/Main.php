<?php

namespace App\Controllers;

use Resend;

class Main extends BaseController
{
    protected $objRequest;
    protected $lang;
    protected $resend;

    public function __construct()
    {
        session();

        # Services
        $this->objRequest = \Config\Services::request();

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
        $this->resend = Resend::client(RESEND_KEY);
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
            try {
                $this->resend->emails->send([
                    'from' => 'Portafolio <no-reply@axleyherrera.com>',
                    'to' => ['dev@axleyherrera.com'],
                    'subject' => "Hola Axley",
                    'html' => view('email/contactEmail', $emailData)
                ]);
            } catch (\Exception $e) {
                $result = array();
                $result['error'] = 1;
                $result['msg'] = $e->getMessage();

                return json_encode($result);
            }

            $result = array();
            $result['error'] = 0;
            $result['msg'] = 'success';

            return json_encode($result);
        }

        $result = array();
        $result['error'] = 1;
        $result['msg'] = 'Missing required fields';

        return json_encode($result);
    }
}
