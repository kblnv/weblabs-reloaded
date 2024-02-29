<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactPageController extends Controller
{
    public function index()
    {
        return Inertia::render('ContactPage');
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstName' => ['required', 'alpha', 'max:255'],
            'secondName' => ['required', 'alpha', 'max:255'],
            'thirdName' => ['required', 'alpha', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'regex: /^((\+7|\+3)\d{8,10})?$/'],
            'gender' => ['nullable', 'string', 'in:м,ж'],
            'calendarValue' => ['nullable', 'date', 'before_or_equal:today'],
        ], [
            'firstName.required' => 'Поле Имя обязательно для заполнения.',
            'firstName.alpha' => 'Поле Имя должно содержать только буквенные символы.',
            'firstName.max' => 'Поле Имя не должно превышать :max символов.',
            'secondName.required' => 'Поле Фамилия обязательно для заполнения.',
            'secondName.alpha' => 'Поле Фамилия должно содержать только буквенные символы.',
            'secondName.max' => 'Поле Фамилия не должно превышать :max символов.',
            'thirdName.required' => 'Поле Отчество обязательно для заполнения.',
            'thirdName.alpha' => 'Поле Отчество должно содержать только буквенные символы.',
            'thirdName.max' => 'Поле Отчество не должно превышать :max символов.',
            'email.required' => 'Поле Email обязательно для заполнения.',
            'email.string' => 'Поле Email должно быть строкой.',
            'email.email' => 'Поле Email должно содержать корректный адрес электронной почты.',
            'email.max' => 'Поле Email не должно превышать :max символов.',
            'phone.regex' => 'Поле Телефон имеет неправильный формат.',
            'calendarValue.date' => 'Поле Дата должно быть корректной датой.',
            'calendarValue.before_or_equal' => 'Поле Дата должно быть датой, предшествующей или равной текущей дате.',
        ]);

        return to_route('contact.index');
    }
}