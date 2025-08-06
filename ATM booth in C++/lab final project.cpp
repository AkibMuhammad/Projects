#include <iostream>

using namespace std;

class ATM
{
protected:
    int pin=1234;
    double balance=10000;
public:
    double getBalance()
    {
        return balance;
    }
    int checkPin()
    {
        int x;
        cout<<"Enter your pin:"<<endl;
        cin>>x;
        while(x!=pin)
        {
            cout<<"Wrong! Try again!"<<endl;
            cin>>x;
        }
    }
};

class Deposit: public ATM
{
public:
    double deposit(double a)
    {
        balance+=a;
        return balance;
    }
};

class Withdraw: public ATM
{
public:
    double withdraw(double a)
    {
        balance-=a;
        return balance;
    }
};

main()
{
    int choice;
    double d,w;
    ATM objATM;
    Deposit objDep;
    Withdraw withObj;
    cout<<"    Welcome to ATM!"<<endl<<endl<<endl;
    objATM.checkPin();
    cout<<endl;

    cout<<"Proceed:"<<endl<<endl;
    cout<<"1.Check balance"<<endl<<"2.Deposit money"<<endl<<"3.Withdraw money"<<endl;
    cin>>choice;
    if(choice==1)
    {
        cout<<objATM.getBalance()<<" TK"<<endl;
    }
    else if(choice==2)
    {
        cout<<"Enter the amount:"<<endl;
        cin>>d;
        objDep.deposit(d);
        cout<<"Current balance: "<<objDep.getBalance()<<" TK"<<endl;
    }
    else if(choice==3)
    {
        cout<<"Enter the amount:"<<endl;
        cin>>w;
        withObj.withdraw(w);
        cout<<"Current balance: "<<withObj.getBalance()<<" TK"<<endl;
    }
    else
        cout<<"Invalid choice"<<endl;

}









