<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function adminContact()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }

    public function addContact()
    {
        return view('admin.contact.create');
    }

    public function storeContact(Request $request)
    {
        $contacts = new Contact();
        $contacts->address = $request->address;
        $contacts->email = $request->email;
        $contacts->phone = $request->phone;
        $contacts->save();
        return redirect()->route('adminContact')->with('success', 'Contact Info Added Successfully');
    }

    public function editContact($id)
    {
        $contacts = Contact::find($id);
        return view('admin.contact.edit', compact('contacts'));
    }

    public function updateContact(Request $request, $id)
    {
        $contacts = Contact::find($id);
        $contacts->address = $request->address;
        $contacts->email = $request->email;
        $contacts->phone = $request->phone;
        $contacts->update();
        return redirect()->route('adminContact')->with('success', 'Contact Info Added Successfully');
    }

    public function deleteContact($id)
    {
        $delete = Contact::find($id)->delete();
        return redirect()->back()->with('success', 'About Info Deleted Successfully');
    }

   public function adminMessage(){

    $messages = ContactForm::all();
    return view('admin.contact.message',compact('messages'));
   }

   public function deleteMessage($id)
   {
    $delete=ContactForm::find($id)->delete();
    return redirect()->back()->with('success', 'Message Deleted Successfully');
   }

    //   ******** Contact Home Route ***********

    public function Contact()
    {
        $contact = Contact::latest()->first();
        return view('pages.contact', compact('contact'));
    }

    public function ContactForm(Request $request)
    {
        $Messege = new ContactForm();
        $Messege->name = $request->name;
        $Messege->email = $request->email;
        $Messege->subject = $request->subject;
        $Messege->massage  = $request->massage ;
        $Messege->save();
        return redirect()->route('Contact')->with('success', 'Message Sent Successfully');

    }
}
