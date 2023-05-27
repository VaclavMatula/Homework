import webcolors

def get_rgb_code(color_name):
    try:
        color = webcolors.name_to_rgb(color_name)
        return color
    except ValueError:
        return None

def main():
    color_name = input("Zadejte anglický název barvy: ")
    rgb_code = get_rgb_code(color_name)
    if rgb_code:
        print(f"RGB kód barvy {color_name} je {rgb_code}")
    else:
        print("Nepodařilo se rozpoznat zadanou barvu.")

if __name__ == "__main__":
    main()