<?php

namespace App\Http\Controllers;

use App\Models\ReceiveCashReminder;
use App\Http\Requests\StoreReceiveCashReminderRequest;
use App\Http\Requests\UpdateReceiveCashReminderRequest;
use App\Models\ReceiveCash;
use Illuminate\Http\Request;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class ReceiveCashReminderController extends Controller
{
    public function index()
    {

        $receive_cash_reminders = ReceiveCashReminder::all();

        return view('pages.receive_cash_reminder.index', compact('receive_cash_reminders'));

    }

    public function show_reminders($id)
    {

        $receive_cash_reminder = ReceiveCashReminder::where('receive_cash_id', $id)->get();

        return view('pages.receive_cash_reminder.show', compact('receive_cash_reminder'));

    }



    public function create($id)
    {

        $receive_cash = ReceiveCash::findOrFail($id);

        return view('pages.receive_cash_reminder.create', compact('receive_cash'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'receive_cash_reminder_date' => 'required|date',
            'paid_amount' => 'required|numeric',
            'remaining_amount' => 'required|numeric',
            'description' => 'nullable|string'
        ]);
        ReceiveCashReminder::create($request->except('reminder'));

        return redirect()->route('receive_cash_reminder.index')->with('toast_success', 'تم حفظ باقى استلام نقدية بنجاح');

    }

    public function pdfReport($id)
    {

        $reminder = ReceiveCashReminder::findOrFail($id);
        $data = [
            'reminder' => $reminder
        ];

        $pdf =  PDF::loadView('pages.receive_cash_reminder.pdf_report', $data);
        return $pdf->stream('Report.pdf');
    }

    public function edit() {}

    public function update() {}

    public function delete() {}
}
