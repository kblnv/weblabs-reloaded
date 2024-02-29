<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class TestPageController extends Controller
{
    public function index()
    {
        return Inertia::render('TestPage');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'firstQuestion' => ['required', 'string', 'in:A,B,C,D'],
                'secondQuestion' => ['required', 'string', 'in:A,B,C,D'],
                'thirdQuestion' => ['required', 'string', 'in:A,B,C,D'],
                'fourthQuestion' => ['required', 'string', 'regex:/^(\S+\s*){20,}$/', 'max:1024'],
                'firstName' => ['required', 'alpha', 'max:255'],
                'secondName' => ['required', 'alpha', 'max:255'],
                'thirdName' => ['required', 'alpha', 'max:255'],
                'group' => [
                    'required', 'string',
                    'in:ИБ/б-21-1-о,ИБ/б-21-2-о,ИВТ/б-21-1-о,ИВТ/б-21-2-о,ИВТ/б-21-3-о,ИС/б-21-1-о,ИС/б-21-2-о,ИС/б-21-3-о,ПИ/б-21-1-о,ПИ/б-21-2-о,ИБ/б-20-1-о,ИБ/б-20-2-о,ИВТ/б-20-1-о,ИВТ/б-20-2-о,ИС/б-20-1-о,ИС/б-20-2-о,ПИ/б-20-1-о,ПИН/б-20-1-о'
                ],
            ],
            [
                'firstQuestion.required' => 'Поле Первый вопрос обязательно для заполнения.',
                'firstQuestion.string' => 'Поле Первый вопрос должно быть строкой.',
                'firstQuestion.in' => 'Поле Первый вопрос должно содержать одно из значений: A, B, C, D.',
                'secondQuestion.required' => 'Поле Второй вопрос обязательно для заполнения.',
                'secondQuestion.string' => 'Поле Второй вопрос должно быть строкой.',
                'secondQuestion.in' => 'Поле Второй вопрос должно содержать одно из значений: A, B, C, D.',
                'thirdQuestion.required' => 'Поле Третий вопрос обязательно для заполнения.',
                'thirdQuestion.string' => 'Поле Третий вопрос должно быть строкой.',
                'thirdQuestion.in' => 'Поле Третий вопрос должно содержать одно из значений: A, B, C, D.',
                'fourthQuestion.required' => 'Поле Четвертый вопрос обязательно для заполнения.',
                'fourthQuestion.string' => 'Поле Четвертый вопрос должно быть строкой.',
                'fourthQuestion.regex' => 'Поле Четвертый вопрос должно содержать не менее 20 слов.',
                'fourthQuestion.max' => 'Поле Четвертый вопрос не должно превышать :max символов.',
                'firstName.required' => 'Поле Имя обязательно для заполнения.',
                'firstName.alpha' => 'Поле Имя должно содержать только буквенные символы.',
                'firstName.max' => 'Поле Имя не должно превышать :max символов.',
                'secondName.required' => 'Поле Фамилия обязательно для заполнения.',
                'secondName.alpha' => 'Поле Фамилия должно содержать только буквенные символы.',
                'secondName.max' => 'Поле Фамилия не должно превышать :max символов.',
                'thirdName.required' => 'Поле Отчество обязательно для заполнения.',
                'thirdName.alpha' => 'Поле Отчество должно содержать только буквенные символы.',
                'thirdName.max' => 'Поле Отчество не должно превышать :max символов.',
                'group.required' => 'Поле Группа обязательно для заполнения.',
                'group.string' => 'Поле Группа должно быть строкой.',
                'group.in' => 'Поле Группа должно содержать одно из допустимых значений'
            ]
        );

        return to_route('test.index');
    }
}
