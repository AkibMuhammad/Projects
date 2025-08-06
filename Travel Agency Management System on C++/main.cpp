#include <iostream>
using namespace std;

int main ()
{
    int Attempt;
    Attempt=0;

    string customerName;
    string customerPassword;

    while (Attempt < 3)
    {
        cout << "Please enter your user name: ";
        cin >> customerName;
        cout << "Please enter your user password: ";
        cin >> customerPassword;

        if (customerName == "Akib" && customerPassword == "1234")
        {
            cout << "Welcome Sir!"<<endl;
            cout << "Thank you for logging in Sir."<<endl;
            break;

        }
        else if (customerName == "Shovon" && customerPassword == "5678")
        {
            cout << "Greetings Sir!\n";
            cout << "Thank you for logging in Sir."<<endl;
            break;
        }
        else
        {
            cout << "Invalid password or customerName. Please try again Sir.\n"<<endl;
            Attempt++;
        }
    }
    if (Attempt == 3)
    {
            cout << "Please reset your password! The program will now terminate.";
            return 0;
    }
}
