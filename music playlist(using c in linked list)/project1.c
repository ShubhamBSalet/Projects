#include <stdio.h>
#include <stdlib.h>
#include <string.h>

struct node
{
    char add[40];
    struct node *next;
};
struct node *head = NULL;
char temp[100];

void read()
{
    struct node *tempa = NULL;
    FILE *fp;
    char add[100];

    

        fp = fopen("playlist.txt", "r");

        while (!feof(fp))
        {
            if (fp == NULL)
            {
                break;
            }
            else
            {
                fscanf(fp, "%s", add);
                if (head == NULL)
                {
                    head = tempa = (struct node *)malloc(sizeof(struct node));
                }
                else
                {
                    tempa->next = (struct node *)malloc(sizeof(struct node));
                    tempa = tempa->next;
                }
                tempa->next = NULL;
                strcpy(tempa->add, add);
                // struct node *temp;
                // while (head != NULL)
                // {
                //     temp = head;
                //     head = head->next;
                //     free(temp->add);
                //     free(temp);
                // }
            }
        }

        fclose(fp);
    
}

void add_music()
{

    struct node *new_node;
    new_node = (struct node *)malloc(sizeof(struct node));
    printf("Enter Music name [ space --> _(underscore) ]:");
    // while ((getchar()) != '\n');
    // scanf("%[^\n]s",temp);
    scanf("%s", temp);

    strcpy(new_node->add, temp);
    // printf("%s", new_node->add);

    // Insert Element
    if (head == NULL)
    {
        head = new_node;
        new_node->next = NULL;
    }
    else
    {
        struct node *curr = head;
        while (curr->next != NULL)
        {
            curr = curr->next;
        }
        curr->next = new_node;
        new_node->next = NULL;
    }
}

void show()
{
    struct node *ptr;
    int i = 1;
    if (head == NULL)
    {
        printf("\nUSER NOT ENTER ANY SONG");
        return;
    }
    else
    {
        ptr = head;
        printf("song :");
        while (ptr != NULL)
        {
            printf("\n%d ---> %s", i, ptr->add);
            ptr = ptr->next;
            i++;
        }
    }
}

void first_song()
{
    struct node *ptr;
    int i = 1;
    if (head == NULL)
    {
        printf("\n USER NOT ENTER ANY SONG");
        return;
    }
    else
    {
        printf("%s... playing", head->add);
    }
}

void play_want()
{
    struct node *ptr;
    int i = 1, f = 0;
    if (head == NULL)
    {
        printf("NO SONG IN PLAYLIST");
    }
    else
    {
        ptr = head;
        while (ptr != NULL)
        {
            printf("\n%d ---> %s", i, ptr->add);
            ptr = ptr->next;
            i++;
        }
        ptr = head;
        // printf("\n\n%s\n", ptr->add);
        printf("\nEnter your song Name :");
        scanf("%s", temp);

        // printf("%s",temp);
        while (ptr != NULL)
        {
            f = strcmp(ptr->add, temp);
            if (f == 0)
            {
                printf("%s...  playing", ptr->add);
                break;
            }

            // printf("%s play",ptr->add);

            ptr = ptr->next;
        }
        if (f == 1)
        {
            printf("\nNot have this song");
        }
    }
}

void delete_begin()
{
    if (head == NULL)
    {
        printf("\n USER NOT ENTER ANY SONG");
        return;
    }
    else
    {
        printf("%s is delete", head->add);
        head = head->next;
    }
}

void delete_end()
{
    struct node *pri = NULL, *curr = head;

    if (head == NULL)
    {
        printf("USER NOT ENTER ANY SONG");
        return;
    }
    else if (head->next == NULL)
    {
        curr = head;
        printf("%s is delete", head->add);
        head = NULL;
        free(curr);
    }
    else
    {

        while (curr->next != NULL)
        {
            pri = curr;
            curr = curr->next;
        }
        printf("%s is delete", curr->add);

        pri->next = curr->next;
        free(curr);

        // curr->next=NULL;
    }
}

void save_data()
{
    struct node *h1;
    FILE *fp;
    char temp[100];
    char a = ' ';
    // printf("Enter the file name in(.txt) format :");
    // scanf("%s", temp);

    fp = fopen("playlist.txt", "w");

    if (head == NULL)
    {
        fprintf(fp, "%s", NULL);
    }
    else
    {
        h1 = head;
        while (h1 != NULL)
        {
            fprintf(fp, "%s\n", h1->add);
            h1 = h1->next;
        }
        fprintf(fp, "%c\n", a);
    }
    fclose(fp);

    printf("your playlist is saved succ..fully");
}

int main()
{
    int choice;
    // clrscr();
    // printf("\n\n");
    // printf("\t|\t    B B B B     E E E E    A A A A    T T T T T \t\t\t| \n");
    // printf("\t|\t    B      B    E          A     A        T     \t\t\t|\n");
    // printf("\t|\t    B       B   E          A     A        T     \t\t\t|\n");
    // printf("\t|\t    B      B    E          A     A        T     \t\t\t|\n");
    // printf("\t|\t    B  B B B    E E E E    A A A A        T     \t\t\t|\n");
    // printf("\t|\t    B      B    E          A     A        T     \t\t\t|\n");
    // printf("\t|\t    B       B   E          A     A        T     \t\t\t|\n");
    // printf("\t|\t    B      B    E          A     A        T     \t\t\t|\n");
    // printf("\t|\t    B B B B     E E E E    A     A        T     \t\t\t|\n");
    // printf("\t|\t\t\t\t\t\t\t\t\t\t|\n");
    // printf("\t|\t\t\tW       W   I I I I I   B B B B     E E E E   S S S S\t| \n");
    // printf("\t|\t\t\tW       W       I       B      B    E         S      \t|\n");
    // printf("\t|\t\t\tW       W       I       B       B   E         S      \t| \n");
    // printf("\t|\t\t\tW       W       I       B      B    E         S      \t| \n");
    // printf("\t|\t\t\tW   W   W       I       B  B B B    E E E E   S S S S\t| \n");
    // printf("\t|\t\t\tW  W W  W       I       B      B    E               S\t| \n");
    // printf("\t|\t\t\tW W   W W       I       B       B   E               S\t| \n");
    // printf("\t|\t\t\tWW     WW       I       B      B    E               S\t| \n");
    // printf("\t|\t\t\tW       W   I I I I I   B B B B     E E E E   S S S S\t|\n");
    read();
    do
    {
        printf("\n\n\t\t\t\t___________________________\n");
        printf("\t\t\t\t--------MUSIC PARK---------\n");
        printf("\t\t\t\t___________________________\n");
        printf("\t\t\t\t|1| ---> Add music \n");
        printf("\t\t\t\t---------------------------\n");
        printf("\t\t\t\t|2| ---> Show playlist \n");
        printf("\t\t\t\t---------------------------\n");
        printf("\t\t\t\t|3| ---> play first song \n");
        printf("\t\t\t\t---------------------------\n");
        printf("\t\t\t\t|4| ---> play you want\n");
        printf("\t\t\t\t---------------------------\n");
        printf("\t\t\t\t|5| ---> Delete first song\n");
        printf("\t\t\t\t---------------------------\n");
        printf("\t\t\t\t|6| ---> Delete last song\n");
        printf("\t\t\t\t---------------------------\n");
        printf("\t\t\t\t|7| ---> Save playlist \n");
        printf("\t\t\t\t---------------------------\n");
        // printf("\t\t\t\t|8| ---> read privios content\n");
        // printf("\t\t\t\t---------------------------\n");
        printf("\t\t\t\t|8| ---> Exit\n");
        printf("\t\t\t\t---------------------------\n");

        printf("Enter Your Choice :");
        scanf("%d", &choice);
        // getch();
        switch (choice)
        {
        case 1:
            add_music();
            break;
        case 2:
            show();
            break;
        case 3:
            first_song();
            break;
        case 4:
            play_want();
            break;
        case 5:
            delete_begin();
            break;
        case 6:
            delete_end();
            break;
        case 7:
            save_data();
            break;
        // case 8:
        //     read();
        //     break;
        case 8:
            printf("Your Music journey is stopped");
            break;

        default:
            printf("Invalid choice!\nPlease Enter valid number of playlist\n");
        }
    } while (choice != 8);
    return 0;
}