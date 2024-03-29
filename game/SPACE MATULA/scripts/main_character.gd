extends CharacterBody2D

const SPEED = 300.0
const JUMP_VELOCITY = -850.0
@onready var sprite_2d = $Sprite2D


var gravity = ProjectSettings.get_setting("physics/2d/default_gravity")
var last_direction = 1 

func _physics_process(delta):
	if (velocity.x > 1 or velocity.x < -1):
		sprite_2d.animation = "running"
	else:
		sprite_2d.animation = "default"
	
	if not is_on_floor():
		velocity.y += gravity * delta
		sprite_2d.animation = "jumping"

	if Input.is_action_just_pressed("jump") and is_on_floor():
		velocity.y = JUMP_VELOCITY

	var direction = Input.get_axis("left", "right")
	if direction:
		velocity.x = direction * SPEED
		last_direction = direction
	else:
		velocity.x = move_toward(velocity.x, 0, 40)

	move_and_slide()

	sprite_2d.flip_h = last_direction < 0
