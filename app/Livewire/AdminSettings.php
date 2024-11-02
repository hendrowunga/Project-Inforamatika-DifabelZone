<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\GeneralSettings;
use App\Models\SocialNetwork;

class AdminSettings extends Component
{
    public $tab = null;
    public $default_tab = 'general_settings';
    protected $queryString = ['tab' => ['keep' => true]];
    public $site_name, $site_email, $site_phone, $site_meta_keywords, $site_meta_description;
    public $facebook_url, $instagram_url;

    public function selectTab($tab)
    {
        $this->tab = $tab;
    }

    public function mount()
    {
        $this->tab = request()->tab ? request()->tab : $this->default_tab;

        //Populate
        $this->site_name = get_settings()->site_name;
        $this->site_email = get_settings()->site_email;
        $this->site_phone = get_settings()->site_phone;
        $this->site_meta_keywords = get_settings()->site_meta_keywords;
        $this->site_meta_description = get_settings()->site_meta_description;


        //Populate social networks
        $this->facebook_url = get_social_network()->facebook_url;
        $this->instagram_url = get_social_network()->instagram_url;
    }

    public function updateGeneralSettings()
    {
        $this->validate([
            'site_name' => 'required',
            'site_email' => 'required|email'
        ]);

        $settings = new GeneralSettings();
        $settings = $settings->first();
        $settings->site_name = $this->site_name;
        $settings->site_email = $this->site_email;
        $settings->site_phone = $this->site_phone;
        $settings->site_meta_keywords = $this->site_meta_keywords;
        $settings->site_meta_description = $this->site_meta_description;
        $settings->site_address = $this->site_address;
        $update = $settings->save();

        if ($update) {
            $this->showToastr('success', 'General settings have been successfully updated.');
        } else {
            $this->showToastr('error', 'Something went wrong.');
        }
    }

    public function updateSocialNetworks()
    {
        $social_network = new SocialNetwork();
        $social_network = $social_network->first();
        $social_network->facebook_url = $this->facebook_url;
        $social_network->instagram_url = $this->instagram_url;
        $update = $social_network->save();

        if ($update) {
            $this->showToastr('success', 'Social networks have been successfully updated.');
        } else {
            $this->showToastr('error', 'Something went wrong. Try again later');
        }
    }

    public function showToastr($type, $message)
    {
        return $this->dispatch('showToastr', [
            'type' => $type,
            'message' => $message
        ]);
    }

    public function render()
    {
        return view('livewire.admin-settings');
    }
}