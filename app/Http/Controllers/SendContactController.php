<?php

namespace App\Http\Controllers;

use App\Models\SendContact;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class SendContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = SendContact::orderBy('id', 'desc')->get();
        return view('site.SendContact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('site.SendContact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validatsiya
        $request->validate([
            'fullname' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        // Ma'lumotni saqlash
        $contact = SendContact::create($request->only(['fullname', 'phone']));

        // Telegram API orqali xabar yuborish
        $this->sendTelegramNotification($contact);

        // index sahifasiga qaytish
        return redirect()->route('send_contact.index')->with('success', 'Ma\'lumot yaratildi va Telegramga yuborildi!');
    }

    /**
     * Telegram orqali xabar yuborish funksiyasi
     */
    private function sendTelegramNotification($contact)
    {
        $token = '6802679537:AAEWakvg1nMFrsOY-acCkUHFgeyix9pmWi8'; // Telegram bot tokeningizni tekshiring
        $chatId = '1926484196'; // To'g'ri chat ID ni tekshiring!

        $message = "Yangi ma'lumot yaratildi:\n";
        $message .= "ID: {$contact->id}\n";
        $message .= "FIO: {$contact->fullname}\n";
        $message .= "Telefon: {$contact->phone}\n";

            $client = new Client();
            $url = "https://api.telegram.org/bot{$token}/sendMessage";

            $client->post($url, [
                'form_params' => [
                    'chat_id' => $chatId,
                    'text' => $message,
                ],
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $contact = SendContact::findOrFail($id); // Agar ID topilmasa 404 qaytaradi
        return view('site.SendContact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $contact = SendContact::findOrFail($id);
        return view('site.SendContact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $contact = SendContact::findOrFail($id);

        $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
        ]);

        $contact->update($request->only(['fullname', 'phone']));

        return redirect()->route('send_contact.index')->with('update', "Ma'lumot o'zgartirildi!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contact = SendContact::findOrFail($id);
        $contact->delete();

        return redirect()->route('send_contact.index')->with('delete', "Ma'lumot o'chirildi!");
    }
}
