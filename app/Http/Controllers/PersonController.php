<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class PersonController extends Controller
{
    public function index()
    {
        return Person::all();
    }

    public function store()
    {
        $faker = Faker::create();
        Person::create([
            'name' => $faker->name,
            //'last_name' => $faker->lastName,
            'email' => $faker->unique()->email,
            //'phone' => $faker->phoneNumber,
        ]);

        return redirect()->route('people.index')
            ->with('success', 'Person created successfully.');
    }

    public function show(Person $person)
    {
        return Person::find($person);
    }

    public function update(Request $request, Person $person)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $person->update($validatedData);

        return redirect()->route('people.index')
            ->with('success', 'Person updated successfully.');
    }

    public function destroy(Person $person)
    {
        Person::delete($person);

        return redirect()->route('people.index')
            ->with('success', 'Person deleted successfully.');
    }

    public function fillDummyData()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            Person::create([
                'name' => $faker->name,
                //'last_name' => $faker->lastName,
                'email' => $faker->unique()->email,
                //'phone' => $faker->phoneNumber,
            ]);
        }

        return redirect()->route('people.index')
            ->with('success', 'Dummy data filled successfully.');
    }
}
